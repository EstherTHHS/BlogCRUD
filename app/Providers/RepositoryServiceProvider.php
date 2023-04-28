<?php

namespace App\Providers;

use App\Repository\Blog\BlogRepoInterFace;
use App\Repository\Blog\BlogRepository;
use App\Services\Blog\BlogService;
use App\Services\Blog\BlogServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Step 3 bind interface and repository in boot
        //

        $this->app->bind(BlogRepoInterFace::class, BlogRepository::class);
        $this->app->bind(BlogServiceInterface::class, BlogService::class);
    }
}
