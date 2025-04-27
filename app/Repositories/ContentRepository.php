<?php

namespace App\Repositories;

use App\Models\Content;
use App\Repositories\IElequent\IContentRepository;

class ContentRepository extends BaseRepository implements IContentRepository
{
    public function __construct(Content $model)
    {
        parent::__construct($model);
    }

}
