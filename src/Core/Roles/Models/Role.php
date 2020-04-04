<?php

namespace Core\Roles\Models;

use Core\Database\Model;
use Core\Database\Traits\Slugger;
use Core\Filer\Traits\Filer;
use Core\Hashids\Traits\Hashids;
use Core\Repository\Traits\PresentableTrait;
use Core\Roles\Interfaces\RoleHasRelations as RoleHasRelationsContract;
use Core\Roles\Traits\RoleHasRelations;

class Role extends Model implements RoleHasRelationsContract
{
    use Filer, Hashids, Slugger, PresentableTrait, RoleHasRelations;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'roles.role.model';

    public function setLevelAttribute($value)
    {
        if (empty($value)) {
            return $this->level = 1;
        }

        return $this->level = $value;
    }
}
