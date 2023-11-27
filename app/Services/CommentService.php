<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\CommentRepositoryContract;
use App\Contracts\Services\CommentServiceContract;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentService implements CommentServiceContract
{
    public function __construct(
        private readonly CommentRepositoryContract $commentRepository,
    ) {
    }
    public function getAllByPostPaginate(int $postId): LengthAwarePaginator
    {
       return $this->commentRepository->getAllByPostPaginate($postId);
    }

    public function create(Request $request): void
    {
        Comment::create([
            'post_id' => $request->get('post_id'),
            'user_id' => auth()->id(),
            'text' => $request->get('text')
        ]);
    }
}

