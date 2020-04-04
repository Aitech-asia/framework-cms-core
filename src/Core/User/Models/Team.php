<?php

namespace Core\User\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Core\Database\Model;
use Core\Filer\Traits\Filer;
use Core\Hashids\Traits\Hashids;
use Core\Repository\Traits\PresentableTrait;
use Core\Trans\Traits\Translatable;

class Team extends Model
{
    use Filer, SoftDeletes, Hashids, Translatable, PresentableTrait;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'users.team.model';

    /**
     * The User that belong to the team.
     */
    public function users()
    {
        return $this->belongsToMany('App\User')
            ->withPivot([
                'id', 'role',
            ]);
    }

    public function getManagersAttribute()
    {
        return $this->users()->where('role', 'manager')->get();
    }
    public function getAdminsAttribute()
    {
        return $this->users()->where('role', 'admin')->get();
    }
}
