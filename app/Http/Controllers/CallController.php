<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CallController extends BaseController
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                ['id' => 1, 'caller' => '+1234567890', 'status' => 'completed'],
                ['id' => 2, 'caller' => '+0987654321', 'status' => 'pending'],
            ],
        ]);
    }

    public function one($id): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $id,
                'caller' => '+1234567890',
                'status' => 'completed',
            ],
        ]);
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->all();

        return response()->json([
            'success' => true,
            'message' => 'Call created successfully',
            'data' => $data,
        ], 201);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $data = $request->all();

        return response()->json([
            'success' => true,
            'message' => 'Call updated successfully',
            'data' => array_merge(['id' => $id], $data),
        ]);
    }

}
