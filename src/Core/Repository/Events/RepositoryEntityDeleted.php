<?php
namespace Core\Repository\Events;

/**
 * Class RepositoryEntityDeleted
 * @package Core\Repository\Events
 * @author Laravel <info@info@laravel.org>
 */
class RepositoryEntityDeleted extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "deleted";
}
