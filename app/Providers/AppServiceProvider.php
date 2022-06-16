<?php

namespace App\Providers;

use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
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
        // Unguard all the models
        Model::unguard();

        // Gate Facade
        Gate::define('admin', function (User $user){
           return $user->is_admin === 1 || $user->email === "maide.akdede@hotmail.com";
        });

        // Pagination
        Paginator::defaultView('pagination::default');


    }
}
