<?php

namespace App\Actions;

use App\Models\Book;
use App\Models\Review;

class DestroyReviewAction
{
    /**
     * Execute the action.
     *
     * @param int $bookId
     * @return ?Review
     */
    public function execute(int $reviewId): ?Book
    {
        $review = Review::with('book')->findOrFail($reviewId);

        // obtain a reference to the review book (so we can redirect back to this book)
        $book = $review->book;

        // delete the review and redirect
        $review->delete();

        // update the book rating
        $book->rating = round($book->reviews->avg('rating'), 1);
        $book->save();

        return $book;
    }
}
