<?php

namespace Core\Menu\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Core\Database\Model;
use Core\Database\Traits\Slugger;
use Core\Hashids\Traits\Hashids;
use Core\Node\Traits\SimpleNode;
use Core\Trans\Traits\Translatable;

class Menu extends Model
{
    use Hashids, Slugger, Translatable, SoftDeletes, SimpleNode;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'menu.menu';

    public function getHasRoleAttribute($value)
    {
        if (empty($this->role)) {
            return true;
        }

        if (is_array($this->role) && user()->isOne($this->role)) {
            return true;
        }

        return false;
    }
}
