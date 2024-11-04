<x-layout>

    <div class="header">
        <h2>Add Review</h2>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('reviews.store', $review->book_id) }}">
            @csrf
            @include('reviews._inputs')

            <div class="mt-4">
                <button class="btn btn-primary" type="submit">Create</button>
                <a role="button" href="{{ route('books.show', $review->book_id) }}">Cancel</a>
            </div>

        </form>

    </div>

</x-layout>
