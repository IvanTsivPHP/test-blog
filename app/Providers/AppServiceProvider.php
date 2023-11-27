<?php

namespace App\Providers;

use App\Contracts\Repositories\CommentRepositoryContract;
use App\Contracts\Repositories\PostRepositoryContract;
use App\Contracts\Services\CommentServiceContract;
use App\Contracts\Services\PostServiceContract;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Services\CommentService;
use App\Services\PostService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PostServiceContract::class, PostService::class);
        $this->app->singleton(CommentServiceContract::class, CommentService::class);

        $this->app->singleton(PostRepositoryContract::class, PostRepository::class);
        $this->app->singleton(CommentRepositoryContract::class, CommentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
