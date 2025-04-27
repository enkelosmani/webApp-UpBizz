<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService extends BaseService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository){
        parent::__construct($postRepository);
        $this->postRepository = $postRepository;
    }

    public function paginate(int $pageSize = 5)
    {
        $posts = Post::with('content')->latest()->paginate(5);
    }

    public function with($relations)
    {
        return Post::with($relations);
    }
}
