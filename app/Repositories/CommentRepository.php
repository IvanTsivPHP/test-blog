<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\Repositories\CommentRepositoryContract;
use App\Models\Comment;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentRepository implements CommentRepositoryContract
{
    public function getAllByPostPaginate(int $postId): LengthAwarePaginator
    {
        return Comment::with('user:id,email')
            ->where('post_id', $postId)
            ->orderByDesc('created_at')
            ->paginate(10);
    }
}

