<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    public function create(int $id)
    {
        if(!Gate::authorize('create', 'review')){
            return redirect()->back()->with('warning', 'Not authorised');
        }

        $review = new Review;
        $review->book_id = $id;      // set review book_id

        return view('reviews.create', ['review' => $review]);
    }

    // store a review for the book identified by $id
    public function store(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => ['required'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5'],
            'comment' => ['required', 'min:0', 'max:500']
        ]);

        $book = Book::findOrFail($id);
        $book->reviews()->create($data);

        // update the book rating
        $book->rating = round($book->reviews->avg('rating'), 1);
        $book->save();

        return redirect()->route('books.show', $book->id);
    }
    public function show(int $id)
    {
        $review = Review::with('book')->findOrFail($id);
        return view('reviews.show', ['review' => $review]);
    }

    public function destroy(int $id)
    {
        if(!Gate::authorize('delete', 'review')){
            return redirect()->back()->with('warning', 'Not authorised');
        }
        // load the review
        $review = Review::with('book')->findOrFail($id);

        // obtain a reference to the review book (so we can redirect back to this book)
        $book = $review->book;

        // update the book rating
        $book->rating = round($book->reviews->avg('rating'), 1);
        $book->save();

        // delete the review and redirect
        $review->delete();
        return redirect()->route('books.show', $book->id);
    }
}
