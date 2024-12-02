<?php

namespace App\Actions;

use App\DataTransferObjects\BookDTO;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;

class AddBookAction
{
    /**
     * Execute the action.
     *
     * @param array $data
     * @return ?Book
     */
    public function execute(array $data): ?Book
    {
        if ($data['image']) {
            // encode file to base64 and store it in the database
            //$base64 = base64_encode(file_get_contents($data['image']));
            //$data['image'] = "data:{$data['image']->getMimeType()};base64,{$base64}";

            // store file in public storage
            $path = $data['image']->store('books', 'public');
            $data['image'] = $path;
        }
        return Book::create($data);
    }
}
