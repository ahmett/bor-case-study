<?php

namespace App\Traits;

use App\Enums\ResponseStatus;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ReturnsJsonResponse
{
    public function respondWithSuccess(array $data = [], ?string $message = null): JsonResponse
    {
        return $this->collectResponse($data, ResponseStatus::Success, $message);
    }

    public function respondWithFail(array $data = [], int $code = Response::HTTP_NOT_ACCEPTABLE, ?string $message = null): JsonResponse
    {
        return $this->collectResponse($data, ResponseStatus::Fail, $message)->setStatusCode($code);
    }

    public function respondWithError(string $message, array $data = [], int $code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return $this->collectResponse($data, ResponseStatus::Error, $message)->setStatusCode($code);
    }

    private function collectResponse(array $payload, ResponseStatus $status, ?string $message): JsonResponse
    {
        return response()->json([
            'data' => $payload,
            'status' => $status,
            'message' => $message,
        ]);
    }
}
