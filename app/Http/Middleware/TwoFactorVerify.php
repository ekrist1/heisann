<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Carbon\Carbon;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if(
            isset($user->tokens->token_2fa_expiry) &&
            $user->tokens->token_2fa_expiry > Carbon::now() &&
            $user->tokens->fingerprint == $request->header('User-Agent'))
                {
                    return $next($request);
                }

        return redirect('/dashboard/ark-2fa');

    }
}
