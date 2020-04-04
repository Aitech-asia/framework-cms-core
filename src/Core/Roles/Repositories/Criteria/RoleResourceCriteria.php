<?php

namespace Core\Roles\Repositories\Criteria;

use Core\Repository\Contracts\CriteriaInterface;
use Core\Repository\Contracts\RepositoryInterface;

class RoleResourceCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        return $model;
    }
}
