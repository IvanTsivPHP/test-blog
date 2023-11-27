<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Post extends Model
{
    use HasFactory, Filterable, AsSource;

    public $table = 'posts';

    public $timestamps = true;

    public $fillable = [
        'published',
        'title',
        'html',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
