<?php

namespace App\Exceptions;
use Illuminate\Auth\AuthenticationException;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    protected function unauthenticated($request, AuthenticationException $exception)
    {

        $guard = \Arr::get($exception->guards(), 0);

        switch ($guard) {

            case "admin":
                $rediect = "admin.login";
                break;
            case "customer":
                $rediect = "customer.login";
                break;
            case "agent":
                $rediect = "agent.login";
                break;
            case "user":
                $redirect = "user.login";
                break;
            default:
                $redirect = "/";
                break;
        }
        return $request->expectsJson()
            ? response()->json(['message' => $exception->getMessage()], 401)
            : redirect()->guest(route($redirect));
    }
    
}
