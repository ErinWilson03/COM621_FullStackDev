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
            <x-ui.badge> {{ $book->category->name }}</x-ui.badge>
        </div>

        <div class="flex items-start">
            <div class="w-full">
                <dl class="display flex">
                    {{-- one way of displaying authors --}}
                    <dt>Author</dt>
                    <dd>
                        @foreach ($book->authors as $author)
                            <x-ui.badge variant="green">{{ $author->name }}</x-ui.badge>
                        @endforeach
                    </dd>
                    <div class="flex justify-end gap-2">
                        @can('update', App\Models\Book::class)
                            <x-ui.link variant="light" href="{{ route('authorbooks.create', $book->id) }}"
                                class="flex gap-1 items-center">
                                <x-ui.svg size="sm" plus />
                            </x-ui.link>
                        @endcan
                        @can('delete', App\Models\Book::class)
                            <x-ui.link variant="dark" href="{{ route('authorbooks.delete', $book->id) }}"
                                class="flex gap-1 items-center">
                                <x-ui.svg size="sm" minus />
                            </x-ui.link>
                        @endcan
                    </div>
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
            </div>
            @if ($book->image)
                <div class="w-1/3">
                    <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}">
                </div>
            @endif
        </div>

        <div class="flex justify-end gap-2 mt-2">
            <x-ui.link variant="oblue" href="{{ route('books.edit', $book->id) }}">Edit</x-ui.link>
            @include('books._delete')
        </div>
    </x-ui.card>

    <!-- TBC add authors partial here -->
    @include('books._authors')
    @include('books._reviews')

</x-layout>
