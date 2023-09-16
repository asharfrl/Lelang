<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
    foreach ($exception->errors() as $error) {
        if (in_array('The email has already been taken.', $error)) {
            return redirect()->route('welcome')->with('error', 'Gunakan Alamat Email Yang Lain');
        }

        // Tambahkan kondisi untuk pesan kesalahan username unik
        if (in_array('The username has already been taken.', $error)) {
            return redirect()->route('welcome')->with('error', 'Gunakan Username Yang Lain');
        }
    }
}

    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
            //
        });
    }
}
