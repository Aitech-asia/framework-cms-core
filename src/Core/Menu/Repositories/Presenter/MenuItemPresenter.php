<?php

namespace Core\Menu\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class MenuItemPresenter extends FractalPresenter
{
    /**
     * Prepare data to present.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MenuItemTransformer();
    }
}
