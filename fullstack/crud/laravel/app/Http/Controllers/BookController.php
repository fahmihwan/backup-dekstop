<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $books = Book::latest()->get();
        return response()->json([
            'status' => 'success',
            'data' => $books,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Todo created successfully',
            'data' => $book,
        ]);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $book,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::where('id', $id)->update([
            'title' => $request->title,
            'author' => $request->author
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Todo updated successfully',
            'data' => $book,
        ]);
    }

    public function destroy($id)
    {
        $data = Book::where('id', $id)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Todo deleted successfully',
            'todo' => $data,
        ]);
    }
}
