<?php namespace Core\Repository\Transformer;

use League\Fractal\TransformerAbstract;
use Core\Repository\Contracts\Transformable;

/**
 * Class ModelTransformer
 * @package Core\Repository\Transformer
 * @author Laravel <info@info@laravel.org>
 */
class ModelTransformer extends TransformerAbstract
{
    public function transform(Transformable $model)
    {
        return $model->transform();
    }
}
