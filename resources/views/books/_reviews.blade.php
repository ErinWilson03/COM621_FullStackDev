<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Reviewed</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($book->reviews as $review)
            <tr>
                <td>{{ $review->name }}</td>
                <td>{{ $review->updated_at->diffForHumans() }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ str($review->comment)->take(50) }}...</td>
                <td>
                    <a role="button" href="{{ route('reviews.show', $review->id) }}">View</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

