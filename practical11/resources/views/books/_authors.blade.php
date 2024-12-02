<!-- TBC display a header with links to add/remove authors -->
<x-ui.header class="mt-3">
    <h2>Authors</h2>
    <div class="flex gap-2 mt-2">
        @can('update', App\Models\Book::class)
            <x-ui.link variant="light" href="{{ route('authorbooks.create', $book->id) }}" class="flex gap-1 items-center">
                <x-ui.svg size="sm" plus />
                Add
            </x-ui.link>
        @endcan
        @can('delete', App\Models\Book::class)
            <x-ui.link variant="dark" href="{{ route('authorbooks.delete', $book->id) }}" class="flex gap-1 items-center">
                <x-ui.svg size="sm" minus />
                Delete
            </x-ui.link>
        @endcan
    </div>
</x-ui.header>

<x-ui.card>
    <!-- TBC display author names in badge components -->
    <div class="flex flex-wrap gap-2 items-center">
        @foreach ($book->authors as $author)
            <x-ui.badge variant="green">{{ $author->name }}</x-ui.badge>
        @endforeach
    </div>
</x-ui.card>
