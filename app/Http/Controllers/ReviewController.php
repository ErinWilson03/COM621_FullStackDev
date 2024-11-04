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

        // TBC - locate the book

        // TBC - create a new review for the book

        // TBC update the book rating and save

        // TBC - redirect to the book page

    }
    public function show(int $id)
    {
        $review = Review::with('book')->findOrFail($id);
        return view('reviews.show', ['review' => $review]);
    }

    public function destroy(int $id)
    {
        // TBC - load the review and associated book

        // TBC - obtain a reference to the review book (so we can redirect back to this book)

        // TBC - update the book rating and save

        // TBC - delete the review

        // TBC - redirect to book show (using the book reference obtained above)

    }
}
