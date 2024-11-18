<x-layout>

    <div class="header">
        <h2>Create Book</h2>
        <a href="/books">Back</a>
    </div>

    <div class="card">

        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            @include('books._inputs')

            <div class="mt-4">
                <button class="btn btn-primary" type="submit">Create</button>
                <x-ui.link variant="green" href="{{ route('books.index') }}">Cancel</x-ui.link>
            </div>

        </form>

    </div>

</x-layout>
