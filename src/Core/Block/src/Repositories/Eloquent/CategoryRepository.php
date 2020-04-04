<?php

namespace Core\Block\Repositories\Eloquent;

use Core\Block\Interfaces\CategoryRepositoryInterface;
use Core\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->pushCriteria(app('Core\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('Core.block.category.search');
        return config('Core.block.category.model');
    }
}
