<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SodiumEncrypter;
use App\Company;

class SodiumEncryptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sodiumencrypter', function ($app)
        {
            $key = config()->get('app.sodium');
            return new \App\Services\SodiumEncrypter($key);
        });
    }
}
