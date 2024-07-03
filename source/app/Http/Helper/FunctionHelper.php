<?php
use Illuminate\Support\Facades\Route;


if (! function_exists('currentController')) {
    function currentController() {
        $route = Route::current();
        $controller = class_basename($route->getController());

        return $controller;
    }
}

if (!function_exists('responseSuccess')) {
    function responseSuccess($data = [], $message = 'Success', $code = 200, $isApi = 'false')
    {
        if ($isApi) {
            return response()->json([
                'code' => $code,
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ], $code);
        } else {
            return view('success', ['message' => $message, 'data' => $data]);
        }
    }
}

if (!function_exists('responseError')) {
    function responseError($message = 'Error', $code = 500, $data = [], $isApi = 'false')
    {
        if ($isApi) {
            return response()->json([
                'code' => $code,
                'status' => 'fail',
                'message' => $message,
                'data' => $data,
            ], $code);
        } else {
            return view('error', ['message' => $message, 'data' => $data]);
        }
    }
}
