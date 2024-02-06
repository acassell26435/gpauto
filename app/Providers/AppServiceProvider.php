<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\SocialLogin;
use Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        view()->composer('*', function ($view) {

            $contact = Contact::first();
            $social_login = SocialLogin::first();
            $auth = Auth::user();
            $view->with(['auth' => $auth, 'contact' => $contact, 'social_login' => $social_login]);
        });
    }
}
