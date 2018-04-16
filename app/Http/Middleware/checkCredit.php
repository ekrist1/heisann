<?php

namespace App\Http\Middleware;

use Closure;
use App\Company;

class checkCredit
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
        if (Company::CurrentCompany()->credit < 14) {
            return redirect('/dashboard')->with('status', 'Du må fylle på mer saldo');
    }
        return $next($request);

    }
}
