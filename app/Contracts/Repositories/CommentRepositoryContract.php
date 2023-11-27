<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface CommentRepositoryContract
{
    public function getAllByPostPaginate(int $postId): LengthAwarePaginator;
}
