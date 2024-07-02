<?php
use Illuminate\Support\Facades\Route;


if (! function_exists('currentController')) {
    function currentController() {
        $route = Route::current();
        $controller = class_basename($route->getController());

        return $controller;
    }
}
