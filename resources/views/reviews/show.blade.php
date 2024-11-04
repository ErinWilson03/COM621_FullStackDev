<x-layout>
    <div class="header">
        <h2>Review</h2>
        <a href="{{ route('books.show', $review->book_id) }}">Back</a>
    </div>
    <div class="card">
        <div class="flex items-center gap-2">
            <h3>{{ $review->name }}</h3>
            <span class="badge badge-blue">Review ID: {{ $review->id }}</span>
        </div>

        <dl>
            <dt>Reviewed</dt>
            <dd>{{ $review->updated_at->diffForHumans() }}</dd>
        </dl>

        <dl>
            <dt>Rating</dt>
            <dd><span class="badge badge-pink">{{ $review->rating }}</span> </dd>
        </dl>

        <dl>
            <dt>Comment</dt>
            <dd>{{ $review->comment }}</dd>
        </dl>
    </div>

    <form method="POST" action="{{ route('reviews.destroy', $review->id) }}">
        @csrf
        <div class="mt-4">
            <button class="btn btn-primary" type="submit">Delete</button>
        </div>
    </form>

</x-layout>
