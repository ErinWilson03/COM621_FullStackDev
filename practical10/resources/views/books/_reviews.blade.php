<table class="table">
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
                <td>{{ $review->created_at_for_humans }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ str($review->comment)->take(50) }}...</td>
                <td>
                    <!-- TBC actions -->
                    <x-ui.link variant="slink" href="{{ route('reviews.show', $review->id) }}" class="flex items-center">
                        <x-ui.svg info />
                        <span></span>View</span>
                    </x-ui.link>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
