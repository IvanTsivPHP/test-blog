<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Services\CommentServiceContract;
use App\Contracts\Services\PostServiceContract;
use Illuminate\Contracts\Support\Renderable;

class PostController extends Controller
{
    public function __construct(
        private readonly PostServiceContract $postService,
        private readonly CommentServiceContract $commentService
    ) {
    }

    public function index(): Renderable
    {
        $posts = $this->postService->getAllPaginate();

        return view('home', compact('posts'));
    }

    public function show(int $id): Renderable
    {
        $post = $this->postService->get($id);

        $comments = $this->commentService->getAllByPostPaginate($id);

        return view('post', compact(['post', 'comments']));
    }
}

