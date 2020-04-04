<?php

namespace Core\Master\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Core\Database\Model;
use Core\Database\Traits\DateFormatter;
use Core\Database\Traits\Slugger;
use Core\Filer\Traits\Filer;
use Core\Hashids\Traits\Hashids;
use Core\Repository\Traits\PresentableTrait;
use Core\Trans\Traits\Translatable;

class Master extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, DateFormatter, Translatable, PresentableTrait;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'master.master.model';

    public function parent()
    {
        return $this->belongsTo('Core\Master\Models\Master', 'parent_id');
    }

}
