<x-layout>

    <div class="header">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}">Create</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Rating</th>
                <!-- TBC Add category header -->
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
                    <!-- TBC Add category data -->
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
