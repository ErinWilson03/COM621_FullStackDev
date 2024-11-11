<x-layout>

    <div class="header">
        <h2>Review</h2>
        <a href="{{ route('books.show', $review->book_id) }}">Back</a>
    </div>

    <div class="card">

        <div class="flex items-center gap-2">
            <h3>{{ $review->book->title }}</h3>
        </div>

        <dl>
            <dt>Name</dt>
            <dd>{{ $review->name }}</dd>
        </dl>

        <dl>
            <dt>Rating</dt>
            <dd>{{ $review->rating }}</dd>
        </dl>

        <dl>
            <dt>Reviewed</dt>
            <dd>{{ $review->created_at_for_humans }}</dd>
        </dl>

        <dl>
            <dt>Comment</dt>
            <dd>{{ $review->comment }}</dd>
        </dl>

        <div class="flex justify-end gap-2 mt-2">
            <form method="POST" action="{{ route('reviews.destroy', $review->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
</x-layout>
