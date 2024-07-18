<?php

namespace App\Helper;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ResponseHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    /**
     * @description Return a success response
     * @param $message
     * @param $statusCode
     * @param $data
     * @return JsonResponse
     */
    public static function success($message, $statusCode, $data = null): JsonResponse
    {
        return response()->json([
            'status' => $statusCode,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    /**
     * @description Return an error response
     * @param $message
     * @param $statusCode
     * @return JsonResponse
     */
    public static function error($message, $statusCode): JsonResponse
    {
        return response()->json([
            'status' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }
}
