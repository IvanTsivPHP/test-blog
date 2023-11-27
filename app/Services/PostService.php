<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Repositories\PostRepositoryContract;
use App\Contracts\Services\PostServiceContract;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService implements PostServiceContract
{
    public function __construct(
        private readonly PostRepositoryContract $postRepository,
    ) {
    }

    public function getAllPaginate(): LengthAwarePaginator
    {
        return $this->postRepository->getAllPaginate();
    }

    public function get(int $id): Post
    {
        return $this->postRepository->get($id);
    }
}

