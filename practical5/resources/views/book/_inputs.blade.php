<div class="mt-2">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}" />
    @error("title")
        <div class="text-sm text-red-500 mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mt-2">
    <label for="author">Author</label>
    <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" />
    @error("author")
        <div class="text-sm text-red-500 mt-2">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="flex gap-2 mt-2">
    <div class="w-1/2">
        <label for="year">Year</label>
        <input type="number" id="year" name="year" value="{{ old('year', $book->year) }}" />
        @error("year")
            <div class="text-sm text-red-500 mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="w-1/2">
        <label for="rating">Rating</label>
        <input type="number" id="rating" name="rating" value="{{ old('rating', $book->rating) }}" />
        @error("rating")
            <div class="text-sm text-red-500 mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="mt-2">
    <label for="description">Description</label>
    <textarea rows="4" id="description" name="description">{{ old('description', $book->description) }}</textarea>
    @error("description")
        <div class="text-sm text-red-500 mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
