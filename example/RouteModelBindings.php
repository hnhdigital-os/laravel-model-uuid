<?php

namespace App\Http\Routes;

use App\Models\User;
use Illuminate\Routing\Router;

class RouteModelBindings
{
    /**
     * Define your route model bindings.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public static function boot(Router $router)
    {
        $router->bind('user', function ($value) {
            return User::whereUuid('uuid', $value)->first();
        });
    }
}
