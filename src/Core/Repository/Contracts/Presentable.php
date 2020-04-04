<?php
namespace Core\Repository\Contracts;

/**
 * Interface Presentable
 * @package Core\Repository\Contracts
 * @author Laravel <info@info@laravel.org>
 */
interface Presentable
{
    /**
     * @param PresenterInterface $presenter
     *
     * @return mixed
     */
    public function setPresenter(PresenterInterface $presenter);

    /**
     * @return mixed
     */
    public function presenter();
}
