<x-layout>

    <x-ui.breadcrumb class="my-3" :crumbs="[
        'Home' => route('home'),
        'Books' => route('books.index'),
        $book->id => route('books.show', $book->id),
        'Add' => '',
    ]" />

    <x-ui.header>
        <h2>Add Author to {{ $book->title }}</h2>
    </x-ui.header>

    <x-ui.card>

        <!-- TBC add form to add author to book here -->

    </x-ui.card>

</x-layout>
