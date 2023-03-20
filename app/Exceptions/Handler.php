<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        CategoryDeleteException::class,
        ProductDeleteException::class,
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Exception|Throwable $exception)
    {
        if ($exception instanceof CategoryDeleteException) {
            return response()->json([
                'success' => false,
                'errors' => ['Cannot be deleted because of the connection to the product.'],
                'data' => [],
            ], 400);
        }

        if ($exception instanceof ProductDeleteException) {
            return response()->json([
                'success' => false,
                'errors' => ['Product already deleted.'],
                'data' => [],
            ], 400);
        }

        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'errors' => ['Record not found'],
                'data' => [],
            ], 404);
        }

        return parent::render($request, $exception);
    }
}
