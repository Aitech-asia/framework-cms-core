<?php

namespace Core\Settings\Repositories\Criteria;

use Core\Repository\Contracts\CriteriaInterface;
use Core\Repository\Contracts\RepositoryInterface;

class SettingUserCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model
                        ->where('user_id', '=', user_id())
                        ->where('user_type', '=', user_type());

        return $model;
    }
}
