<?php

namespace App\Services;

use App\Repositories\ContentRepository;

class ContentService extends BaseService
{
    protected $contentRepository;

    public function __construct(ContentRepository $contentRepository)
    {
        parent::__construct($contentRepository);
        $this->contentRepository = $contentRepository;
    }

}
