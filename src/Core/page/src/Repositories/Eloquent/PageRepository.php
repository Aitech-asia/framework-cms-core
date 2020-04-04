<?php

namespace Core\Page\Repositories\Eloquent;

use Core\Page\Interfaces\PageRepositoryInterface;
use Core\Repository\Eloquent\BaseRepository;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{

    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->fieldSearchable = config('Core.page.page.search');
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('Core.page.page.model');
    }

    /**
     * Get page by id or slug.
     *
     * @return void
     */
    public function getPage($var)
    {
        return $this->findBySlug($var);
    }
}
