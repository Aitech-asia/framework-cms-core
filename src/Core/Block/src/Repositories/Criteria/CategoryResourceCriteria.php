<?php

namespace Core\Block\Repositories\Criteria;

use Core\Repository\Contracts\CriteriaInterface;
use Core\Repository\Contracts\RepositoryInterface;

class CategoryResourceCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model
                        ->where('user_id','=', user_id())
                        ->where('user_type','=', user_type());
        return $model;
    }
}