<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book;
        return view('book.create', ['book' => new Book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(['title', 'author', 'year', 'rating', 'description']);

        $book = Book::create($data);
        return view('book.show', ['book' => $book]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // TBC
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // TBC
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // TBC
    }
}
