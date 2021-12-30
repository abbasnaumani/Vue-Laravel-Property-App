<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Kodestudio\ApiResponse\Traits\ApiResponseTrait;
use Plank\Mediable\Exceptions\MediaUploadException;
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
            if ($e instanceof TransferException) {
                return response()->json(['Error' => 'Unable to retrieve a list of customer ship addresses.'], $e->getCode());
            }
            if ($e instanceof ValidationException) {
                $this->setApiErrorMessage($this->extractErrorMessage($e->errors()), ['errors' => $this->traceErrors($e)]);
            } elseif ($e instanceof AuthenticationException) {
                $this->setApiErrorMessage($e->getMessage(), ['errors' => $this->traceErrors($e)],401);
            } elseif ($e instanceof \Illuminate\Http\Exceptions\PostTooLargeException) {
                $this->setApiErrorMessage("Post Size is too large.", ['errors' => $this->traceErrors($e)], $e->getStatusCode());
            }elseif ($e instanceof \Illuminate\Database\QueryException) {
                $this->setApiErrorMessage($e->errorInfo[2]??'Query Exception', ['errors' => $this->traceErrors($e)]);
            } elseif ($e instanceof ModelNotFoundException) {
                $this->setApiErrorMessage("Modal Not Found", ['errors' => $this->traceErrors($e)]);
            } elseif ($e instanceof MediaUploadException) {
                $this->setApiErrorMessage($e->getMessage(), ['errors' => $this->traceErrors($e)]);
            } else {
                $this->setApiErrorMessage($e->getMessage(), ['errors' => $this->traceErrors($e)]);
            }
            return $this->getApiResponse();
        });
    }

}
