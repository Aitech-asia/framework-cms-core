<?php

namespace Core\Roles\Models;

use Core\Database\Model;
use Core\Database\Traits\Slugger;
use Core\Filer\Traits\Filer;
use Core\Hashids\Traits\Hashids;
use Core\Repository\Traits\PresentableTrait;
use Core\Roles\Traits\PermissionHasRelations;
use Core\Trans\Traits\Translatable;

class Permission extends Model
{
    use Filer, Hashids, Slugger, Translatable,  PresentableTrait, PermissionHasRelations;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'roles.permission.model';

    public function getSlugIdAttribute()
    {
        return $this->slug.'.'.$this->id;
    }
}
