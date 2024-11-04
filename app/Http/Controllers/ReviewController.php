<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(int $id)
    {
        $review = new Review;
        $review->book_id = $id;      // set review book_id

        return view('reviews.create', ['review' => $review]);
    }

    // store a review for the book identified by $id
    public function store(Request $request, int $id)
    {
        // TBC - validate the request data
        $data = $request->validate([
            'name' => ['required'],
            'rating' =>['required', 'numeric', 'min:0', 'max:5'],
            'comment' =>['required', 'min:0', 'max:1000']
        ]);
        // TBC - locate the book
        $book = Book::findOrFail($id);

        // TBC - create a new review for the book
        $book->reviews()->create($data);
        $rating = $book->reviews->avg('rating');
        // TBC update the book rating and save
        $book->update(['rating'=>$rating]);
        $book->save();

        // TBC - redirect to the book page
        return redirect()->route('books.show', [$id => $book->id]);

    }
    public function show(int $id)
    {
        $review = Review::with('book')->findOrFail($id);
        return view('reviews.show', ['review' => $review]);
    }

    public function destroy(int $id)
    {
        // TBC - load the review and associated book
        $review = Review::findOrFail($id);

        // TBC - obtain a reference to the review book (so we can redirect back to this book)
        $book = $review->book;
        $rating = $book->reviews->avg('rating');
        // TBC update the book rating and save
        $book->update(['rating'=>$rating]);
        $book->save();

        // TBC - delete the review
        $review->delete();

        // TBC - redirect to book show (using the book reference obtained above)
        return redirect()->route('books.show', ['id'=>$book->id]);
    }
}
