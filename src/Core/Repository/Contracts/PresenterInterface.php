<?php
namespace Core\Repository\Contracts;

/**
 * Interface PresenterInterface
 * @package Core\Repository\Contracts
 * @author Laravel <info@info@laravel.org>
 */
interface PresenterInterface
{
    /**
     * Prepare data to present
     *
     * @param $data
     *
     * @return mixed
     */
    public function present($data);
}
