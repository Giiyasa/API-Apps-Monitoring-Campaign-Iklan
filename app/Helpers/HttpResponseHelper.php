<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\MasterLogging;

class HttpResponse
{
    public static function success_getall($query, Request $request, string $message = 'Success', int $code = 200): JsonResponse
    {
        $perPage = (int) $request->input('per_page', 10);
        if ($perPage < 1) $perPage = 10;
        if ($perPage > 100) $perPage = 100;

        $page = (int) $request->input('page', 1);
        if ($page < 1) $page = 1;

        $paginated = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $paginated->items(),
            'pagination' => [
                'current_page' => $paginated->currentPage(),
                'per_page' => $paginated->perPage(),
                'total' => $paginated->total(),
                'last_page' => $paginated->lastPage(),
                'from' => $paginated->firstItem(),
                'to' => $paginated->lastItem(),
            ],
        ], $code);
    }


    public static function success($data = null, string $message = 'Success', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function error(string $message = 'Something went wrong', ?\Throwable $exception = null, int $code = 500): JsonResponse
    {
        $errorMessage = $exception ? $exception->getMessage() : $message;

        return response()->json([
            'status' => 'error',
            'message' => $errorMessage,
            'exception' => config('app.debug') ? [
                'file' => $exception?->getFile(),
                'line' => $exception?->getLine(),
                'trace' => $exception?->getTraceAsString(),
            ] : null
        ], $code);
    }



    public static function notFound(string $message = 'Data not found', int $code = 404): JsonResponse
    {
        return self::error($message, null, $code);
    }

    public static function deleted(string $message = 'Deleted successfully'): JsonResponse
    {
        return self::success(null, $message, 200);
    }
    public static function updated($data = null, string $message = 'updated successfully'): JsonResponse
    {
        return self::success($data, $message, 200);
    }
    public static function created($data = null, string $message = 'created successfully'): JsonResponse
    {
        return self::success($data, $message, 200);

    }
}
