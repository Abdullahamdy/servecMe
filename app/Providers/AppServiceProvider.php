<?php

namespace App\Providers;

use App\Models\SocialMedia;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\View;

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

        $socials = SocialMedia::all();

        // Sharing is caring
        View::share('socials', $socials);

    }
}
