<?php

namespace App\Http\Controllers\Tenant;

use App\Mail\SendToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Company;
use App\Services\LogToStat;

class TwoFactorController extends Controller
{
    public function verifyTwoFactor(Request $request)
    {
        $request->validate([
            '2fa' => 'required',
        ]);

        $user = auth()->user();
        if (isset($user->tokens->token_2fa)) {
            if ($request->input('2fa') == auth()->user()->tokens->token_2fa) {
                $token_2fa = $user->tokens()->updateOrCreate(
                    ['user_id' => $user->id],
                    ['token_2fa_expiry' => Carbon::now()->addHours(config('constants.token_lifetime')),
                    'fingerprint' => $request->header('User-Agent')]
                );

                LogToStat::logUsage('OTP');

                return redirect('/dashboard')->with('status', 'Du har nå tilgang til mottatte og sendte meldinger i 8 timer');

            } else {

                return redirect('/dashboard/ark-2fa')->with('status', 'Feil kode. Prøv på nytt');
            }
        }
        return redirect('/dashboard/ark-2fa')->with('status', 'Feil kode. Prøv på nytt');
    }

    public function sendTokenEmail(Request $request) {

        $user = auth()->user();
        $token_2fa = $user->tokens()->updateOrCreate(
            ['user_id' => $user->id],
            ['token_2fa' =>  mt_rand(10000,99999)]
        );

        Mail::to($user->email)->send(new SendToken($token_2fa));

        // reduce credit
        $newcredit = Company::CurrentCompany()->updateCredit(config('constants.logonPrice'));

        return response('E-post med engangskode er sendt', 200);

    }

    public function showTwoFactorForm()
    {
        return view('auth.two_factor');
    }

}
