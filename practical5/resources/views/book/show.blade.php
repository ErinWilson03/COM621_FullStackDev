<x-layout>

    <div class="header">
        <h2>Book</h2>
        <a href="/books">Back</a>
    </div>

    <div class="card">

        <div class="flex items-center gap-1">
            <h3>{{ $book->title }}</h3>
            <span class="badge badge-pink">Rating {{ $book->rating }}</span>
        </div>

        <dl>
            <dt>Title</dt>
            <dd>{{ $book->title }}</dd>
        </dl>

        <dl>
            <dt>Author</dt>
            <dd>{{ $book->author }}</dd>
        </dl>

        <dl>
            <dt>Year</dt>
            <dd>{{ $book->year }}</dd>
        </dl>

        <dl>
            <dt>Description</dt>
            <dd>{{ $book->description }}</dd>
        </dl>

        <div class="flex justify-end gap-2 mt-2">
            <!-- TBC -->
            <!-- add edit link -->
            <!-- add delete form -->
        </div>
    </div>


</x-layout>
