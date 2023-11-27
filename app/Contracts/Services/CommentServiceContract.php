<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface CommentServiceContract
{
    public function getAllByPostPaginate(int $postId): LengthAwarePaginator;

    public function create(Request $request): void;
}
