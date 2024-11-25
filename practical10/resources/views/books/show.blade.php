<x-layout>
    <x-ui.breadcrumb class="my-3" :crumbs="[
        'Home' => route('home'),
        'Books' => route('books.index'),
        $book->id => '',
    ]" />

    <x-ui.header>
        <h2>Book</h2>

        <x-ui.link variant="light" :href="route('books.index')" class="flex gap-1 items-center">
            <x-ui.svg arrow-left size="sm" />
            <span>Books</span>
        </x-ui.link>

    </x-ui.header>

    <x-ui.card>

        <div class="flex items-center gap-2">
            <h3>{{ $book->title }}</h3>
            <span class="badge badge-blue"> {{ $book->category->name }}</span>
        </div>

        <dl class="display">
            <dt>Author</dt>
            <dd>{{ $book->author }}</dd>
        </dl>

        <dl class="display">
            <dt>Year</dt>
            <dd>{{ $book->year }}</dd>
        </dl>

        <dl class="display">
            <dt>Rating</dt>
            <dd><span class="badge badge-pink">{{ $book->rating }}</span> </dd>
        </dl>

        <dl class="display">
            <dt>Description</dt>
            <dd>{{ $book->description }}</dd>
        </dl>

        <div class="flex justify-end gap-2 mt-2">
            <x-ui.link variant="oblue" href="{{ route('books.edit', $book->id) }}">Edit</x-ui.link>
            @can('delete', $book)
                <!-- Trigger button -->
                <x-ui.button variant="ored" x-data @click="$dispatch('open-modal')">Delete</x-ui.button>
            @endcan
        </div>
    </x-ui.card>

    <x-ui.header class="mt-3">
        <h2>Reviews</h2>
        @can('create', App\Models\Review::class)
            <x-ui.link variant="light" href="{{ route('reviews.create', $book->id) }}" class="flex gap-1 items-center">
                <x-ui.svg size="sm" plus />
                Add
            </x-ui.link>
        @endcan
    </x-ui.header>

    <x-ui.card>
        @include('books._reviews')
    </x-ui.card>

    <x-ui.modal>
        <x-slot:title>
            Confirm
        </x-slot:title>

        <p>Are you sure you want to delete {{ $book->title }} ?</p>

        <x-slot:footer>
            <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                @csrf
                @method('DELETE')
                <x-ui.button type="submit" variant="red">Delete</x-ui.button>
                <x-ui.link variant="light" x-data @click="$dispatch('close-modal')">Cancel</x-ui.link>
            </form>

        </x-slot:footer>
    </x-ui.modal>



</x-layout>
