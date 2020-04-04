<?php
namespace Core\Repository\Contracts;

/**
 * Interface CriteriaInterface
 * @package Core\Repository\Contracts
 * @author Laravel <info@info@laravel.org>
 */
interface CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository);
}
