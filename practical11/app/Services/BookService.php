<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookService
{
    public function add(array $data): ?Book
    {
        // check for image, store file and add path to $data
        if ($data['image']) {
            $path = $data['image']->store('books', 'public');
            // store file path in database
            $data['image'] = $path;
        }

        // create the book
        $book = Book::create($data);
        return $book;
    }

    public function delete(int|Book|null $book): bool
    {
        // find the book if it is an integer
        if (is_int($book)) {
            $book = Book::find($book);
        }
        // return false if book is not found
        if (!$book) {
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
