<?php

namespace App\Repositories\IElequent;

interface IPostRepository
{
    public function paginate(int $pageSize = 5);

}
