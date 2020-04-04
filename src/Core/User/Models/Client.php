<?php

namespace Core\User\Models;

use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Core\Filer\Traits\Filer;
use Core\Hashids\Traits\Hashids;
use Core\Repository\Traits\PresentableTrait;
use Core\Roles\Traits\CheckRoleAndPermission;
use Core\User\Contracts\UserPolicy;
use Core\User\Traits\User as UserProfile;
use Str;

class Client extends Model implements UserPolicy
{
    use Filer, Notifiable, CheckRoleAndPermission, UserProfile, SoftDeletes, Hashids, PresentableTrait;
    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = null;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $role = null;

    /**
     * Initialiaze client modal.
     *
     * @param $name
     */
    public function __construct($attributes = [])
    {
        $config = config($this->config);

        foreach ($config as $key => $val) {
            if (property_exists(get_called_class(), $key)) {
                $this->$key = $val;
            }
        }

        $this->setRole($this->role);

        parent::__construct($attributes);
    }

    public function messages()
    {
        return $this->morphMany('\Core\Message\Models\Message', 'user');
    }

    public function setPasswordAttribute($val)
    {
        if (Hash::needsRehash($val)) {
            $this->attributes['password'] = bcrypt($val);
        } else {
            $this->attributes['password'] = ($val);
        }
    }

    public function setaApiTokenAttribute($val)
    {
        if (empty($val)) {
            $this->attributes['api_token'] = Str::random(60);
        }
    }
}
