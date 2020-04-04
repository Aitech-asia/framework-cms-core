<?php
namespace Core\Repository\Events;

/**
 * Class RepositoryEntityCreated
 * @package Core\Repository\Events
 * @author Laravel <info@info@laravel.org>
 */
class RepositoryEntityCreated extends RepositoryEventBase
{
    /**
     * @var string
     */
    protected $action = "created";
}
