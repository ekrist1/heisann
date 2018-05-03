<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Tenant\Observers\TenantObserver;
use App\Tenant\Manager;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Carbon::setLocale('no');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Manager::class, function () {
            return new Manager();
        });

        $this->app->singleton(TenantObserver::class, function () {
            return new TenantObserver(app(Manager::class)->getTenant());
        });

        Request::macro('tenant', function () {
            return app(Manager::class)->getTenant();
        });

    }
}
