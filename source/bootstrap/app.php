<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Authorization' => \App\Http\Middleware\Authenticate::class,
            'Unauthorized' => \App\Http\Middleware\NotAuthenticate::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        ]);
        $middleware->api(prepend: [
            \Illuminate\Cookie\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Throwable $e, $request) {
            if ($e instanceof ThrottleRequestsException) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'code' => 429,
                        'status' => 'fail',
                        'message' => 'Bạn thao tác nhanh quá. Vui lòng thao tác chậm lại',
                        'data' => []
                    ], 200);
                } else {
                    return response()->view('errors.throttle', [], 200);
                }
            }

            if ($e instanceof NotFoundHttpException) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'Không tìm thấy trang yêu cầu.',
                        'data' => []
                    ], 200);
                } else {
                    return response()->view('errors.404', [], 200);
                }
            }

            return (new ExceptionHandler(app()))->render($request, $e);
        });
    })
    ->create();
