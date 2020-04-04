<?php
namespace Core\Repository\Events;

/**
 * Class RepositoryEntityUpdated
 * @package Core\Repository\Events
 * @author Laravel <info@info@laravel.org>
 */
class RepositoryEntityUpdated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "updated";
}
