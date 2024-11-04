<div class="mt-2">
    <label for="Name">Name</label>
    <input type="text" id="name" name="name" value="{{ old('name', $review->name) }}" />
    @error('name')
        <div class="error">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mt-2">
    <label for="rating">Rating</label>
    <input type="number" id="rating" name="rating" value="{{ old('rating', $review->rating) }}" />
    @error('rating')
        <div class="error">
            {{ $message }}
        </div>
    @enderror
</div>


<div class="mt-2">
    <label for="comment">Comment</label>
    <textarea rows="6" id="comment" name="comment">{{ old('comment', $review->comment) }}</textarea>
    @error('comment')
        <div class="text-sm text-red-500 mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
