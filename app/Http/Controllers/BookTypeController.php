<?php

namespace App\Http\Controllers;

use App\Models\BookType;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreBookTypeRequest;
use App\Http\Requests\UpdateBookTypeRequest;

class BookTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $bookTypes = BookType::withCount('books')->paginate(15);

        return response()->json([
            'success' => true,
            'data'    => $bookTypes,
        ]);
    }

    public function store(StoreBookTypeRequest $request): JsonResponse
    {
        $bookType = BookType::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Book type created successfully.',
            'data'    => $bookType,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $bookType = BookType::with('books')->find($id);

        if (!$bookType) {
            return response()->json([
                'success' => false,
                'message' => 'Book type not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $bookType,
        ]);
    }

    public function update(UpdateBookTypeRequest $request, string $id): JsonResponse
    {
        $bookType = BookType::find($id);

        if (!$bookType) {
            return response()->json([
                'success' => false,
                'message' => 'Book type not found.',
            ], 404);
        }

        $bookType->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Book type updated successfully.',
            'data'    => $bookType->fresh(),
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $bookType = BookType::find($id);

        if (!$bookType) {
            return response()->json([
                'success' => false,
                'message' => 'Book type not found.',
            ], 404);
        }

        if ($bookType->books()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete book type that has associated books.',
            ], 409);
        }

        $bookType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book type deleted successfully.',
        ]);
    }
}
