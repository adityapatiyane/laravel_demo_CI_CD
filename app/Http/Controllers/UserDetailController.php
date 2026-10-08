<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => 'ok',
            'data' => UserDetail::latest()->get(),
        ]);
    }

    public function show(int $id): JsonResponse
    {
        $user = UserDetail::find($id);

        if (! $user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User detail not found',
            ], 404);
        }

        return response()->json([
            'status' => 'ok',
            'data' => $user,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:user_details,email',
            'photo' => 'nullable|string|max:255',
            'address' => 'required|string',
        ]);

        $user = UserDetail::create($validated);

        return response()->json([
            'status' => 'ok',
            'message' => 'User detail created successfully',
            'data' => $user,
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $user = UserDetail::find($id);

        if (! $user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User detail not found',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:user_details,email,'.$id,
            'photo' => 'nullable|string|max:255',
            'address' => 'sometimes|required|string',
        ]);

        $user->update($validated);

        return response()->json([
            'status' => 'ok',
            'message' => 'User detail updated successfully',
            'data' => $user->fresh(),
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $user = UserDetail::find($id);

        if (! $user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User detail not found',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => 'ok',
            'message' => 'User detail deleted successfully',
        ]);
    }
}
