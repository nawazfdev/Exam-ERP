<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Page;
use App\Models\SiteSetting;
use Auth;

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
        Paginator::useBootstrap();
         // Share the with all views
        //  View::composer('front.resources.header', function ($view) {
        //     $view->with('user', Auth::user());
        // });
        // View::share('pages', Page::all());
        // $siteSettings = SiteSetting::find(1);
        // View::share('siteSettings', $siteSettings);
    }
    protected function getTotalFavorites()
    {
        // Assuming you have a relation for 'favorites' in the User model
        // You can adjust this logic to fit your requirements
        return Auth::check() ? Auth::user()->favorites->count() : 0;
    }
}
