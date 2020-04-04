<?php

namespace Core\Block\Repositories\Eloquent;

use Core\Block\Interfaces\BlockRepositoryInterface;
use Core\Repository\Eloquent\BaseRepository;

class BlockRepository extends BaseRepository implements BlockRepositoryInterface
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
        $this->fieldSearchable = config('Core.block.block.search');
        return config('Core.block.block.model');
    }
    /**
     * take block count based on category
     * @param type $id
     * @return type
     */

    public function countBlocksCategory($id)
    {

        return $this->model
            ->whereCategoryId($id)
            ->where('published', 'Yes')
            ->whereStatus('Show')
            ->count();
    }


    /**
     * take forum categories
     * @param type $category
     * @return type
     */

    public function categorys($category)
    {
        return $this->model
            ->whereCategoryId($category)
           
            ->orderBy('id', 'DESC')
            ->get();
    }
}
