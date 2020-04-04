<?php

namespace Core\Support\Facades;

use Illuminate\Support\Facades\Facade;
use Core\Contracts\Workflow\Workflow as WorkflowContract;

class Workflow extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return WorkflowContract::class;
    }
}
