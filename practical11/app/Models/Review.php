<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;

    protected $guarded  = ['id'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Public accessor method to return created_at in human readable format
     * @return mixed
     */
    public function getCreatedAtForHumansAttribute()
    {
        return $this->created_at->diffForHumans();
    }


    // TBC remove this method and migrate the business logic to the new action classes
    public static function boot()
    {
        parent::boot();

        static::created(function ($review) {
            $review->book->rating = round($review->book->reviews->avg('rating'), 1);
            $review->book->save();
        });

        static::deleted(function ($review) {
            $review->book->rating = round($review->book->reviews->avg('rating'), 1) ?? 0;
            $review->book->save();
        });
    }
}
