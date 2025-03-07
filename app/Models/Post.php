<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];

    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {

        // if(isset($filters['search']) ? $filters['search'] : false) {
        //     $query->where('title', 'like', '%' . request('search') . '%');
        // }

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

    }
}
