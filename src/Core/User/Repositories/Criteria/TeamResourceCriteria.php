<?php

namespace Core\User\Repositories\Criteria;

use Core\Repository\Contracts\CriteriaInterface;
use Core\Repository\Contracts\RepositoryInterface;

class TeamResourceCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        return $model;
    }
}