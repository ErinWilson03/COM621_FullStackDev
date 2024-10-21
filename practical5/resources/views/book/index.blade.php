<x-layout>

    <div class="header">
        <h1>Books</h1>
        <a href="/books/create">Create</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Rating</th>
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
                    <td>
                        <a href={{ "/books/{$book->id}" }}>View</a>
                        <a href={{ "/books/{$book->id}/edit" }}>Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layout>
