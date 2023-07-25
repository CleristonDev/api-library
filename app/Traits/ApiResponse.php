<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

trait ApiResponse
{
    /**
     * Return a created response.
     *
     * @param $data
     * @return JsonResponse
     */
    public function created($data = []): JsonResponse
    {
        return Response::json($data, 201);
    }

    /**
     * Return an ok response.
     *
     * @param $data
     * @return JsonResponse
     */
    public function ok($data = []): JsonResponse
    {
        return Response::json($data, 200);
    }

    /**
     * Return an no content response.
     *
     * @param $data
     * @return JsonResponse
     */
    public function noContent($data = []): JsonResponse
    {
        return Response::json($data, 204);
    }

    /**
     * Return unauthorized response.
     *
     * @param $data
     * @return JsonResponse
     */
    public function unauthorized(array $data = []): JsonResponse
    {
        return Response::json($data, 401);
    }

    /**
     * Return bad request response.
     *
     * @param $data
     * @return JsonResponse
     */
    public function badRequest(array $data = []): JsonResponse
    {
        return Response::json($data, 400);
    }

    /**
     * Return not found response.
     *
     * @param $data
     * @return JsonResponse
     */
    public function notFound(array $data = []): JsonResponse
    {
        return Response::json($data, 404);
    }
}
