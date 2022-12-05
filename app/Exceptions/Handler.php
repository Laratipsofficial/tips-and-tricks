<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
        'current_password',
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
        $this->reportable(function (Throwable $e) {
            // if (app()->bound('honeybadger') && $this->shouldReport($e)) {
            //     app('honeybadger')->notify($e, app('request'));
            // }
        });
    }

    // // \App\Exceptions\Handler.php
    // protected function buildExceptionContext(Throwable $e)
    // {
    //     $user->roles()->saveManyQuietly($data);

    //     return [
    //         'exception' => [
    //             'origin' => $e,
    //             'context' => [
    //                 'common' => $this->context(),
    //                 'specific' => $this->exceptionContext($e),
    //             ],
    //         ],
    //     ];
    // }
}
