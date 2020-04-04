<?php

namespace Core\Block\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class CategoryListPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategoryListTransformer();
    }
}
