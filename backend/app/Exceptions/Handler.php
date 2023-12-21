<?php

namespace App\Exceptions;

use App\Traits\ReturnsJsonResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ReturnsJsonResponse;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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

    public function render($request, Throwable $e): JsonResponse
    {
        if ($e instanceof ValidationException) {
            return $this->respondWithFail(['messages' => $e->errors()]);
        }

        return $this->respondWithError($e->getMessage(), code: $this->getResponseCode($e));
    }

    private function getResponseCode(Throwable $e): int
    {
        return match (get_class($e)) {
            AuthenticationException::class => Response::HTTP_FORBIDDEN,
            MethodNotAllowedHttpException::class => Response::HTTP_METHOD_NOT_ALLOWED,
            default => Response::HTTP_INTERNAL_SERVER_ERROR,
        };
    }
}
