<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Kodestudio\ApiResponse\Traits\ApiResponseTrait;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponseTrait;

    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $errorMessage = 'Something went wrong.';

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
        $this->renderable(function (Throwable $e) {
            if ($e instanceof ValidationException) {
                $this->errorMessage = $this->extractErrorMessage($e->errors());
            } elseif ($e instanceof AuthenticationException) {
                $this->errorMessage = $e->getMessage();
            } else {
                $this->errorMessage = $e->getMessage();
            }
            $this->setApiErrorMessage($this->errorMessage, ['errors' => $this->traceErrors($e)]);
            return $this->getApiResponse();
        });
    }

}
