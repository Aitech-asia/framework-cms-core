<?php
namespace Core\Repository\Contracts;

/**
 * Interface Transformable
 * @package Core\Repository\Contracts
 * @author Laravel <info@info@laravel.org>
 */
interface Transformable
{
    /**
     * @return array
     */
    public function transform();
}
