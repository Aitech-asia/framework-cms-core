<?php

namespace Core\Page\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class PageListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PageListTransformer();
    }
}
