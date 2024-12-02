<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Actions\AddBookAction;
use Illuminate\Validation\Rule;

use App\Actions\UpdateBookAction;
use App\Actions\DestroyBookAction;

use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\File;
use App\Http\Requests\StoreBookRequest;

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

        // extract query paramerters  $size, $sort, $direction and $search from the request
        $size = $request->input('size', 10);
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');
        $search = $request->query('search', null);

        // perform query
        $books = Book::with(['category'])
            ->search($search)
            ->sortable($sort, $direction)
            ->paginate($size)
            ->withQueryString();

        return view('books.index', ['books' => $books, 'search' => $search]);
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
        $book->rating = 0;
        $categories = Category::all()->pluck('name', 'id');

        return view('books.create', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, AddBookAction $action)
    {
        Gate::allows('create', Book::class);

        // authorise the creation
        $data = $request->validate([
            'title' => ['required', 'unique:books,title'],
            'year' => ['required', 'numeric'],
            'category_id' => ['required'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'description' => ['min:0', 'max:500'],
            'image' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'webp'])->max(1024)]
        ]);

        // create the book using AddBookAction
        $book = $action->execute($data);

        return redirect()->route('books.show', $book->id);
    }

    // store version 2 - using form request
    public function storeRequest(StoreBookRequest $request)
    {
        // authorise the creation
        $data = $request->validated();

        // create the book
        $book = Book::create($data);

        return redirect()->route('books.show', $book->id);
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
    public function update(Request $request, int $id, UpdateBookAction $action)
    {
        Gate::allows('update', Book::class);

        // authorise the creation
        $data = $request->validate([
            'title' => ['required', Rule::unique('books')->ignore($id)],
            'category_id' => ['required'],
            'year' => ['required', 'numeric'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'description' => ['min:0', 'max:800'],
            'image' => ['nullable', File::types(['png', 'jpg', 'jpeg', 'webp'])->max(1024)],
        ]);

        // update the book
        $book = $action->execute($id, $data);
        if ($book === null) {
            return redirect()->route('books.index')
                ->with('error', 'Book not found');
        }
        return redirect()->route("books.show", $id)
            ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, DestroyBookAction $action)
    {
        // authorise the deletion
        Gate::authorize('delete', Book::class);

        if ($action->execute($id)) {
            return redirect()->route('books.index')->with('success', 'Book deleted successfully');
        } else {
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
    }
}
