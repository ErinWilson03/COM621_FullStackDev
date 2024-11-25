<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\File;

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
        $size = $request->input('size', 10);
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');

        $search = $request->input('search', null);

        // TBC implement pagination and sorting
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
            'image' => ['nullable', File::types(['png', 'jpg'])->max(1024)],
        ], ['category_id' => 'The category field is required']);

        if ($request->hasFile('image')) {
            $file = $request->image;
            // set validated data image field to base64 file content 
            $data['image'] = 'data:' . $file->getMimeType()
                . ';base64,'
                . base64_encode(file_get_contents($file));
            // $data['image'] = $request->image->store('books', 'public'); 
        }

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
            'image' => ['nullable', File::types(['png', 'jpg'])->max(1024)],
        ], ['category_id' => 'The category field is required']);

        if ($request->hasFile('image')) {
            $file = $request->image;
            // set validated data image field to base64 file content 
            $data['image'] = 'data:' . $file->getMimeType()
                . ';base64,'
                . base64_encode(file_get_contents($file));
        }

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
