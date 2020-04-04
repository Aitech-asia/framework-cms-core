<?php

namespace Core\Roles\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class RoleListPresenter extends FractalPresenter
{
    /**
     * Prepare data to present.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoleListTransformer();
    }
}
