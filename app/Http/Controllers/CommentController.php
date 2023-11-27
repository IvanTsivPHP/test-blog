<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Services\CommentServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(
        private readonly CommentServiceContract $commentService,
    )
    {
        $this->middleware('verified');
    }

    public function create(Request $request): RedirectResponse
    {
        $this->commentService->create($request);

        return redirect()->route('post', ['id' => $request->get('post_id')]);
    }

}

