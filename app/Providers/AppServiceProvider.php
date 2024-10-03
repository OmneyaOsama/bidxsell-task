<?php

namespace App\Providers;
use App\Services\GeneralAdmissionService;
use App\Services\VipAdmissionService;
use App\Services\GroupBookingService;
use App\Services\EventService;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton('EventService', function ($app) {
            return new EventService();
        });
        $this->app->singleton('GeneralAdmissionService', function ($app) {
            return new GeneralAdmissionService();
        });

        $this->app->singleton('VipAdmissionService', function ($app) {
            return new VipAdmissionService();
        });

        $this->app->singleton('GroupBookingService', function ($app) {
            return new GroupBookingService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);

    }
}
