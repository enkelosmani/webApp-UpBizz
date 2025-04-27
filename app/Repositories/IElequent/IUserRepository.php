<?php

namespace App\Repositories\IElequent;

use Illuminate\Database\Eloquent\Model;

interface IUserRepository
{
    public function findWithPosts($id): ?Model;
}
