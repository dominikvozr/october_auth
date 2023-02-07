<?php namespace Dondo\Auth;

use RainLab\User\Models\User;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        //\Config::set('fortify', \Config::get('dondo.auth::fortify'));
        \Config::set('sanctum', \Config::get('dondo.auth::sanctum'));
        \Config::set('cors', \Config::get('dondo.auth::cors'));

        /* \Cms\Classes\CmsController::extend(function($controller) {
            $controller->middlware(\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class);
        }); */

        $this->app[\Illuminate\Contracts\Http\Kernel::class]
            ->prependMiddleware(\Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class)
            /* ->prependMiddleware(\Fruitcake\Cors\HandleCors::class) */;
        $this->app[\Illuminate\Contracts\Http\Kernel::class]
        ->prependMiddleware(\Fruitcake\Cors\HandleCors::class);
        $this->app[\Illuminate\Contracts\Http\Kernel::class]
        ->prependMiddleware(\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class);
        //$this->app['Illuminate\Contracts\Http\Kernel']->pushMiddleware('Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse');

        User::extend(function ($model) {
            //$model->hasOne['profile'] = [Profile::class, 'key' => 'user_id'];
            $model->addFillable('permissions');
        });

    }

    public function register()
    {
        // Register the service providers provided by the packages used by your plugin
        \App::register(\Laravel\Sanctum\SanctumServiceProvider::class);
        //\App::register(\Laravel\Fortify\FortifyServiceProvider::class);
    }
}
