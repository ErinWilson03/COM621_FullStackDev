<x-layout>

    <div class="header">
        <h2>Edit Book</h2>
        <a href="/books">Back</a>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('books.update', $book->id) }}">
            @csrf
            @method('PUT')

            @include('books._inputs')

            <div class="mt-4">
                <button class="btn btn-primary" type="submit">Update</button>
                <a role="button" href="{{ route('books.show', $book->id) }}">Cancel</a>
            </div>

        </form>

    </div>

</x-layout>
