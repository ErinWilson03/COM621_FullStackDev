<x-layout>

    <div class="header">
        <h2>Book</h2>
        <a href={{route("books.store")}}>Back</a>
    </div>

    <div class="card">

        <form method="POST" action={{route("books.store")}}>
            @csrf
            @method('PUT')

            @include('book._inputs')

            <div class="mt-4">
                <button type="submit">Update</button>
                <a role="button" href={{route("books.store")}}>Cancel</a>
            </div>

        </form>

    </div>

</x-layout>
