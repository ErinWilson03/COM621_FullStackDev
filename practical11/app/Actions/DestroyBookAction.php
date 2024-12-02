<?php

namespace App\Actions;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class DestroyBookAction
{
    /**
     * Execute the action.
     *
     * @param int|Book|null $bookId
     * @return bool
     */
    public function execute(int|Book|null $book): bool
    {
        if (is_int($book)) {
            $book = Book::find($book);
        }

        if ($book === null) {
            return false;
        }

        // delete book image if found then delete the book
        if ($book->image && Storage::disk('public')->exists($book->image)) {
            Storage::disk('public')->delete($book->image);
        }
        $book->delete();

        return true;
    }
}
