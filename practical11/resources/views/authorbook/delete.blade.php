<!-- views/authorbook/create.blade.php -->

<x-layout>

    <x-ui.breadcrumb class="my-3" :crumbs="[
        'Home' => route('home'),
        'Books' => route('books.index'),
        $book->id => route('books.show', $book->id),
        'Remove' => '',
    ]" />

    <x-ui.header>
        <h2>Remove Author from {{ $book->title }}</h2>
    </x-ui.header>

    <x-ui.card>

        <!-- TBC add form to remove author from book here -->

    </x-ui.card>
</x-layout>
