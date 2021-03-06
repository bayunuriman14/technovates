<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        // parent::report($e);
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // CUSTOM BY PROGRAMMER
        if ($this->isHttpException($e)) {
            return $this->renderHttpExceptionView($e);
        }
 
        if (config('app.debug')) {
            return parent::render($request, $e);
        }else{
            return response()->view("errors.default", ['exception' => $e]);
        }
        // END
        return parent::render($request, $e);
    }

     /**
     * Render the error view that best fits that status code.
     * 
     * @param Exception $e
     * @return \Illuminate\Http\Response
     */
    public function renderHttpExceptionView(Exception $e)
    {
        $status = $e->getStatusCode();
        $message = $e->getMessage();
        if (view()->exists("errors.$status")) {
            return response()->view("errors.$status", ['exception' => $e, 'status' => $status, 'message' => $message], $status);
        }else{
            return response()->view("errors.default", ['exception' => $e]);
        }

    }
}
