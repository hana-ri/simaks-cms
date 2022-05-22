<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

use App\Models\User;

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
        If (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }
        
        Paginator::useBootstrap();

        Schema::defaultStringLength(191);

        Gate::define('admin', function(User $user) {
            return $user->is_admin;
        });
    }
}
