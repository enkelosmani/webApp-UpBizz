<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\ContentRepository;
use App\Repositories\IElequent\IBaseRepository;
use App\Repositories\IElequent\IContentRepository;
use App\Repositories\IElequent\IPostRepository;
use App\Repositories\IElequent\IUserRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {
    public function register()
    {
          $this->app->bind(IBaseRepository::class, BaseRepository::class);
          $this->app->bind(IPostRepository::class, PostRepository::class);
          $this->app->bind(IContentRepository::class, ContentRepository::class);
          $this->app->bind(IUserRepository::class, UserRepository::class);

    }

    public function boot(){

    }
}
