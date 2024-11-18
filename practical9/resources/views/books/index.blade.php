<x-layout>

    <div class="header">
        <h1>Books</h1>
        @can('create', App\Models\Book::class)
            <a href="{{ route('books.create') }}">Create</a>
        @endcan
    </div>

    <div class="card">
        <table>
            <thead>
                <!-- TBC header sort links -->
                <tr>
                    <th>
                        Id
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Author
                    </th>
                    <th>
                        Rating
                    </th>
                    <th>
                        Category
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
                            <a href="{{ route('books.show', $book->id) }}">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- TBC Pagination Links -->

</x-layout>
