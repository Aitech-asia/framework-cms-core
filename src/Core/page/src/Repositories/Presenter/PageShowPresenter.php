<?php

namespace Core\Page\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class PageShowPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PageShowTransformer();
    }
}
