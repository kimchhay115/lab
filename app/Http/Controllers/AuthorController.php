<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    public function index(): JsonResponse
    {
        $authors = Author::with('books')->paginate(15);

        return response()->json([
            'success' => true,
            'data'    => $authors,
        ]);
    }

    public function store(StoreAuthorRequest $request): JsonResponse
    {
        $author = Author::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully.',
            'data'    => $author,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $author = Author::with('books')->find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $author,
        ]);
    }

    public function update(UpdateAuthorRequest $request, string $id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        $author->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully.',
            'data'    => $author,
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author not found.',
            ], 404);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author deleted successfully.',
        ]);
    }
}
