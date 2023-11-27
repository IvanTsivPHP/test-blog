<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repositories\PostRepositoryContract;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository implements PostRepositoryContract
{
    public function getAllPaginate(): LengthAwarePaginator
    {
        return Post::where('published', true)
            ->orderByDesc('created_at')
            ->paginate(10);
    }

    public function get(int $id): Post
    {
        return Post::find($id);
    }
}


