<x-layout>

    <x-ui.breadcrumb class="my-3" :crumbs="[
        'Home' => route('home'),
        'Books' => '',
    ]" />

    <x-ui.header>
        <h1>Books</h1>
        @can('create', App\Models\Book::class)
            <x-ui.link variant="light" href="{{ route('books.create') }}" class="flex gap-1 items-center">
                <x-ui.svg plus size="sm" />
                <span>Create</span>
            </x-ui.link>
        @endcan
    </x-ui.header>

    <form method="GET" action="{{ route('books.index') }}" class="flex items-center gap-2 mb-4">
        <div class="flex-1">
            <x-ui.form.input name="search" value="{{ $search }}" class="text-xs" placeholder="search..." />
        </div>
        <x-ui.button variant="yellow" class="text-xs">
            Search
        </x-ui.button>
        <x-ui.link variant="light" class="text-xs" href="{{ route('books.index') }}">Clear
        </x-ui.link>
    </form>

    <x-ui.card>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <x-ui.link-sort name="id">Id</x-ui.link-sort>
                    </th>
                    <th>
                        <x-ui.link-sort name="title">Title</x-ui.link-sort>
                    </th>
                    <th>
                        <x-ui.link-sort name="author">Author</x-ui.link-sort>
                    </th>
                    <th>
                        <x-ui.link-sort name="rating">Rating</x-ui.link-sort>
                    </th>
                    <th>
                        <x-ui.link-sort name="category.name">Category</x-ui.link-sort>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->rating }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>
                            <x-ui.link variant="slink" href="{{ route('books.show', $book->id) }}"
                                class="flex gap-1 items-center">
                                <x-ui.svg info />
                                <span>View</span>
                            </x-ui.link>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-ui.card>

    <!-- TBC Pagination Links -->
    <div class="mt-2">
        {{ $books->links() }}
    </div>

</x-layout>
