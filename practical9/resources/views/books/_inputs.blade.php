<div class="mt-2">
    {{-- value="{{ old('title', $book->title) }}" --}}

    <x-ui.form.input name="title" label="Title" value="{{ old('title', $book->title) }}"/>

</div>

<div class="mt-2">
    {{-- value="{{ old('author', $book->author) --}}
    <x-ui.form.input name="author" label="Author" value="{{ old('author', $book->author)}}"/>

</div>

<div class="mt-2">
    <x-ui.form.select label="Category" name="category_id" value="{{ old('category_id', $book->category_id)}}" :options="$categories"/>
</div>

<div class="flex gap-2 mt-2">
    <div class="w-1/2">
        {{-- value="{{ old('year', $book->year) }}" --}}        <x-ui.form.input name="year" type="number" label="Year" value="{{ old('year', $book->year) }}"/>
    </div>
    <div class="w-1/2">


        <x-ui.form.input name="rating" type="number" label="Rating" value="{{ old('rating', $book->rating) }}"/>
    </div>
</div>

{{-- <div class="mt-2">
    <label for="description">Description</label>
    <textarea rows="6" id="description" name="description">{{ old('description', $book->description) }}</textarea>
    @error('description')
        <div class="text-sm text-red-500 mt-2">
            {{ $message }}
        </div>
    @enderror
</div> --}}

<div class="mt-2">
    <x-ui.form.textarea label="Description" name="description" rows="6" value="{{ old('description', $book->description)}}" />
</div>
