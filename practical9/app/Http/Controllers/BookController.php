<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!Gate::allows('viewAny', Book::class)) {
            return redirect()->route('login')->with('info', 'Please Login to view books');
        }

        // TBC extract query paramerters  $size, $sort, $direction from the request

        // TBC implement pagination and sorting
        $books = Book::with(['category'])->get();

        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('create', Book::class)) {
            return redirect()->back()
                ->with('warning', 'Not authorised');
        }

        $book = new Book;
        $categories = Category::all()->pluck('name', 'id');

        return view('books.create', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // authorise the creation
        Gate::authorize('create', Book::class);

        $data = $request->validate([
            'title' => ['required',],
            'author' => ['required'],
            'year' => ['required', 'numeric'],
            'category_id' => ['required'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'description' => ['min:0', 'max:500'],
        ], ['category_id' => 'The category field is required']);

        Book::create($data);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        if (!Gate::allows('view', Book::class)) {
            return redirect()->route('login')->with('info', 'Please Login to view a book');
        }

        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        if (!Gate::allows('update', Book::class)) {
            return redirect()->route('login')->with('info', 'Please Login to edit a book');
        }

        $book = Book::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');

        return view('books.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // authorise the update
        Gate::authorize('update', Book::class);

        $data = $request->validate([
            'title' => ['required', Rule::unique('books')->ignore($id)],
            'author' => ['required'],
            'category_id' => ['required'],
            'year' => ['required', 'numeric'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'description' => ['min:0', 'max:500'],
        ], ['category_id' => 'The category field is required']);

        $book = Book::findOrFail($id);
        $book->update($data);

        return redirect()->route("books.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // authorise the deletion
        Gate::authorize('delete', Book::class);

        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route("books.index");
    }
}
