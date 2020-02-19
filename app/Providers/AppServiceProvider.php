<?php

namespace App\Providers;

use App\Clients\AtomparkClient;
use App\Contracts\SmsSenderContract;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        URL::forceScheme('https');

        $this->app->singleton(AtomparkClient::class, function() {
            return new AtomparkClient(
              config('services.atompark.public_key'),
              config('services.atompark.private_key')
            );
        });

        $this->app->bind(SmsSenderContract::class, AtomparkClient::class);
    }
}
