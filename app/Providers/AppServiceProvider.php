<?php

namespace App\Providers;

use App\Contact;
use App\SocialLogin;
use Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*', function ($view) {

            $contact = Contact::first();
            $social_login = SocialLogin::first();
            $auth = Auth::user();
            $view->with(['auth' => $auth, 'contact' => $contact, 'social_login' => $social_login]);
        });
    }
}
