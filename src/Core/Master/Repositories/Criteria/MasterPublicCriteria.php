<?php

namespace laravel\Package\Repositories\Criteria;

use Core\Contracts\Repository\Criteria as CriteriaInterface;
use Core\Contracts\Repository\Repository as RepositoryInterface;

class ModulePublicCriteria implements CriteriaInterface
{

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('status', '=', 'Published');
        return $model;
    }
}
