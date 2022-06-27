<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Models\User;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $loggedUserId = Auth::user()->id;
                $userData = User::find($loggedUserId);
                $view->with('userData', $userData);;
                $view->with('userImage', $userData->profile_image
                    ? 'upload/admin/users/profile_images/'.$userData->profile_image
                    : 'backend/assets/images/default/user.png');
            } else {
                $view->with('userData', null);
            }
        });
    }
}
