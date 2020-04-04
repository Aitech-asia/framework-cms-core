<?php

namespace Core\Master\Repositories\Criteria;

use Core\Repository\Contracts\CriteriaInterface;
use Core\Repository\Contracts\RepositoryInterface;

class MasterResourceCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
       

        if (request()->type == null) {

            return $model->orderBy('id', 'DESC')
                ->where('type', 'bloodgroup');

        } 
        elseif (request()->type == 'education_type' || request()->type == 'occupation_type' ) {
        	return $model->orderBy('id', 'DESC')
                ->where('type', strstr(request()->type, '_', true))
                ->where('parent_id', '=',0);
        }
        elseif (request()->type == 'education' || request()->type == 'occupation' ) {
        	return $model->orderBy('id', 'DESC')
                ->where('type',request()->type)
                ->where('parent_id', '!=',0);
        }


        else {

            return $model->orderBy('id', 'DESC')
                ->where('type', request()->type);
        }
    }
}