<x-layout>

    <x-ui.breadcrumb class="my-3" :crumbs="[
        'Home' => route('home'),
        'Books' => route('books.index'),
        $book->id => route('books.show', $book->id),
        'Add' => '',
    ]" />

    <x-ui.header>
        <h2>Add Author to {{ $book->title }}</h2>
    </x-ui.header>

    <x-ui.card>

        <!-- form to add author to book here -->
        <form method="POST" action="{{ route('authorbooks.store', $book->id) }}">
            @csrf
            <div class="mt-2">
                <x-ui.form.select label="Author" name="author_id" value="{{ old('author_id') }}" :options="$authors" />
            </div>
            <div class="flex items-center gap-2 mt-2">
                <x-ui.button variant="dark">Add</x-ui.button>
                <x-ui.link href="{{ route('books.show', $book->id) }}">
                    Cancel
                </x-ui.link>
            </div>
        </form>
    </x-ui.card>

</x-layout>
