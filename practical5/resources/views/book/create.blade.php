<x-layout>

    <div class="header">
        <h2>Book</h2>
        <a href="/books">Back</a>
    </div>

    <div class="card">

        <form method="POST" action="/books">
            @csrf

            <div class="mt-2">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" />
            </div>

            <div class="mt-2">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" value="{{ $book->author }}" />
            </div>

            <div class="flex gap-2 mt-2">
                <div class="w-1/2">
                    <label for="year">Year</label>
                    <input type="number" id="year" name="year" value="{{ $book->year }}" />
                </div>
                <div class="w-1/2">
                    <label for="rating">Rating</label>
                    <input type="number" id="rating" name="rating" value="{{ $book->rating }}" />
                </div>
            </div>

            <div class="mt-2">
                <label for="description">Description</label>
                <textarea rows="4" id="description" name="description">{{ $book->description }}</textarea>
            </div>

            <div class="mt-4">
                <button type="submit">Create</button>
                <a role="button" href="/books">Cancel</a>
            </div>

        </form>

    </div>

</x-layout>
