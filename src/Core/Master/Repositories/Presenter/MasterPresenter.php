<?php

namespace Core\Master\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class MasterPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MasterTransformer();
    }
}