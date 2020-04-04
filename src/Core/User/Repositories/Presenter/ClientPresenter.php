<?php

namespace Core\User\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class ClientPresenter extends FractalPresenter
{
    /**
     * Prepare data to present.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClientTransformer();
    }
}
