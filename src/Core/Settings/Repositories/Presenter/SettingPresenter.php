<?php

namespace Core\Settings\Repositories\Presenter;

use Core\Repository\Presenter\FractalPresenter;

class SettingPresenter extends FractalPresenter
{
    /**
     * Prepare data to present.
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SettingTransformer();
    }
}
