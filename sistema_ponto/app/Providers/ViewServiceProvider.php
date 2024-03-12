<?php
// app/Providers/ViewServiceProvider.php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('isAdmin', Auth::check() && Auth::user()->is_admin);
        });
    }
}

