<?php

declare(strict_types=1);

namespace App\Contracts\Repositories;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostRepositoryContract
{
    public function getAllPaginate(): LengthAwarePaginator;

    public function get(int $id): Post;
}

