<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostServiceContract
{
    public function getAllPaginate(): LengthAwarePaginator;

    public function get(int $id): Post;
}
