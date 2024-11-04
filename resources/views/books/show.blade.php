<x-layout>

    <div class="header">
        <h2>Book</h2>
        <a href="{{ route('books.index') }}">Back</a>
    </div>

    <div class="card">

        <div class="flex items-center gap-2">
            <h3>{{ $book->title }}</h3>
           <span class="badge badge-blue">{{ $book->category->name }}</span>
        </div>

        <dl>
            <dt>Author</dt>
            <dd>{{ $book->author }}</dd>
        </dl>

        <dl>
            <dt>Year</dt>
            <dd>{{ $book->year }}</dd>
        </dl>

        <dl>
            <dt>Rating</dt>
            <dd><span class="badge badge-pink">{{ $book->rating }}</span> </dd>
        </dl>

        <dl>
            <dt>Description</dt>
            <dd>{{ $book->description }}</dd>
        </dl>

        <div class="flex justify-end gap-2 mt-2">
            <a href="{{ route('books.edit', $book->id) }}">Edit</a>
        </div>
    </div>

    <div class="header mt-3">
        <h2>Reviews</h2>
        <a role="link" href="{{ route('reviews.create', $book->id) }}">Add</a>
    </div>
    <div class="card">
        @include('books._reviews')
    </div>

</x-layout>
