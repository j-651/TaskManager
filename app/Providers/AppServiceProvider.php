<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);

        $current_time = Carbon::now();
        $current_hour = $current_time->format('G');
        if(($current_hour == 24) || (($current_hour >= 01) && ($current_hour < 12))) {
            $greeting = 'morning';
        } elseif (($current_hour >= 12) && ($current_hour < 18)) {
            $greeting = 'afternoon';
        } elseif (($current_hour >= 18) && ($current_hour <= 23)) {
            $greeting = 'evening';
        }
        View::share([
                    'current_time' => $current_time,
                    'greeting' => ucwords('Good ' . $greeting)
                    ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
