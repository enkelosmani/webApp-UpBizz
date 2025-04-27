<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\IElequent\IUserRepository;
use Illuminate\Database\Eloquent\Model;


class UserRepository extends BaseRepository implements IUserRepository
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }
    public function findWithPosts($id): ?Model
    {
        return $this->model->with(['posts.content'])->find($id);
    }
}
