<x-layout>

    <div class="header">
        <h2>Add Review</h2>
        <a href="/books">Back</a>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('reviews.store', $review->book_id) }}">
            @csrf

            <div class="mt-2">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $review->name) }}" />
                @error('name')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-2">
                <label for="rating">Rating</label>
                <input type="number" id="rating" name="rating" value="{{ old('rating', $review->rating) }}" />
                @error('rating')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-2">
                <label for="comment">Comment</label>
                <textarea rows="4" id="comment" name="comment">{{ old('comment', $review->comment) }}</textarea>
                @error('comment')
                    <div class="text-sm text-red-500 mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mt-4">
                <button class="btn btn-primary" type="submit">Create</button>
                <a role="button" href="{{ route('books.show', $review->book_id) }}">Cancel</a>
            </div>

        </form>

    </div>

</x-layout>
