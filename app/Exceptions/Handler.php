<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponse;

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
                return $this->error($this->extractErrorMessage($e->errors()), ['errors' => [
                    'getPrevious' => $e->getPrevious(),
                    'getMessage' => $e->getMessage(),
                    'getCode' => $e->getCode(),
                    'getFile' => $e->getFile(),
                    'getLine' => $e->getLine(),
                    'getTrace' => $e->getTrace()
                ]]);
            }
            return $this->error($e->getMessage(), ['errors' => [
                'getPrevious' => $e->getPrevious(),
                'getMessage' => $e->getMessage(),
                'getCode' => $e->getCode(),
                'getFile' => $e->getFile(),
                'getLine' => $e->getLine(),
                'getTrace' => $e->getTrace()
            ]]);
        });
    }

    private function extractErrorMessage($exceptionErrors)
    {
        if (isset($exceptionErrors) && is_array($exceptionErrors) && count($exceptionErrors) > 0) {
            foreach ($exceptionErrors as $error) {
                return $this->extractErrorMessage($error);
            }
        } else {
            return $exceptionErrors;
        }
    }
}
