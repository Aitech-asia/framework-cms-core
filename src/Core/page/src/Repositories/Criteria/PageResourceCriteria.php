<?php

namespace Core\Page\Repositories\Criteria;

use Core\Repository\Contracts\CriteriaInterface;
use Core\Repository\Contracts\RepositoryInterface;

class PageResourceCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        return $model;
    }
}