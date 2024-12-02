<?php

namespace App\Actions;

use App\Models\Book;
use App\Models\Review;

class AddReviewAction
{
    /**
     * Execute the action.
     *
     * @param int $bookId
     * @return ?Review
     */
    public function execute(int $bookId, array $data): ?Review
    {
        $book = Book::find($bookId);
        if (!isset($book)) {
            return null;
        }

        // business logic updating book rating
        $review = $book->reviews()->create($data);
        $book->rating = round($review->book->reviews->avg('rating'), 1);

        $book->save();

        return $review;
    }
}
