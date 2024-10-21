<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $data = $request->validate([
            'title' => ['required'], 
            'author' => ['required'], 
            'year' => ['required', 'numeric'], 
            'rating' => ['numeric', 'min:0', 'max:5'], 
            'description' => ['min:0', 'max:500']
        ]);

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
        $book = Book::findOrFail($id);
        return view('book.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'title' => ['required', Rule::unique('books')->ignore($id)], 
            'author' => ['required'], 
            'year' => ['required', 'numeric'], 
            'rating' => ['numeric', 'min:0', 'max:5'], 
            'description' => ['min:0', 'max:500']
        ]);

        $book = Book::findOrFail($id);
        $book->update($data);
        redirect(route("books.show", $book->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect(route("books.index"));
    }
}
