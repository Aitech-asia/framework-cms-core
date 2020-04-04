<?php
namespace Core\Repository\Presenter;

use Exception;
use Core\Repository\Transformer\ModelTransformer;

/**
 * Class ModelFractalPresenter
 * @package Core\Repository\Presenter
 * @author Laravel <info@info@laravel.org>
 */
class ModelFractalPresenter extends FractalPresenter
{

    /**
     * Transformer
     *
     * @return ModelTransformer
     * @throws Exception
     */
    public function getTransformer()
    {
        if (!class_exists('League\Fractal\Manager')) {
            throw new Exception("Package required. Please install: 'composer require league/fractal' (0.12.*)");
        }

        return new ModelTransformer();
    }
}
