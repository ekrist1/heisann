<?php

namespace App\Http\Middleware\Tenant;

use Closure;
use App\Company;
use App\Tenant\Manager;

class Tenant
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

        $tenant = $this->resolveTenant();

        if (!$tenant) {
            return redirect('/');
        }

        if (!auth()->user()->companies->contains('id', $tenant->id)) {
            return redirect('/');
        }

        $this->registerTenant($tenant);

        return $next($request);
    }

    /**
     * Set up tenant stuff.
     *
     * @param [type] $tenant [description]
     */
    protected function registerTenant($tenant)
    {
        app(Manager::class)->setTenant($tenant);

        session()->put('tenant', $tenant->id);

        config()->set('app.sodium', $tenant->secret_key);
    }

    /**
     * Resolve the tenant.
     *
     * @param  [type] $tenantId [description]
     * @return [type]           [description]
     * //$request->company ?: ;
     */
    protected function resolveTenant()
    {
        if (session()->has('tenant')) {
            return Company::find(session()->get('tenant'));
        };
        if(auth()->user()->companies->count() == 1) {
            $tenantId = auth()->user()->companies[0]->id;
        }
        return Company::find($tenantId);

    }
}
