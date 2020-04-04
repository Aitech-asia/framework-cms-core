<?php

namespace Core\Repository\Traits;

/**
 * Class TransformableTrait
 * @package Core\Repository\Traits
 * @author Laravel <info@info@laravel.org>
 */
trait TransformableTrait
{
    /**
     * @return array
     */
    public function transform()
    {
        return $this->toArray();
    }
}
