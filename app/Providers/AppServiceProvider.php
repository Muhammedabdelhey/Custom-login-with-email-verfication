<?php

namespace App\Providers;

use App\Mail\SendVerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
        // to use bulld in event
        // User::created(function($user){
        //     Mail::to($user->email)->send(new SendVerificationMail($user->email));
        // });
    }
}
