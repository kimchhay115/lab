<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        $books = Book::with(['bookType', 'authors'])->paginate(15);

        return response()->json([
            'success' => true,
            'data'    => $books,
        ]);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = Book::create($request->validated());

        if ($request->has('author_ids')) {
            $book->authors()->sync($request->input('author_ids'));
        }

        $book->load(['bookType', 'authors']);

        return response()->json([
            'success' => true,
            'message' => 'Book created successfully.',
            'data'    => $book,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $book = Book::with(['bookType', 'authors'])->find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $book,
        ]);
    }

    public function update(UpdateBookRequest $request, string $id): JsonResponse
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found.',
            ], 404);
        }

        $book->update($request->validated());

        if ($request->has('author_ids')) {
            $book->authors()->sync($request->input('author_ids'));
        }

        $book->load(['bookType', 'authors']);

        return response()->json([
            'success' => true,
            'message' => 'Book updated successfully.',
            'data'    => $book,
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found.',
            ], 404);
        }

        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully.',
        ]);
    }
}
