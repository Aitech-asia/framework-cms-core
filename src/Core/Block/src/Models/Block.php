<?php

namespace Core\Block\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Core\Database\Model as Model;
use Core\Database\Traits\Slugger;
use Core\Filer\Traits\Filer;
use Core\Hashids\Traits\Hashids;
use Core\Repository\Traits\PresentableTrait;
use Core\Activities\Traits\LogsActivity;
use Core\Trans\Traits\Translatable;
use Core\User\Traits\User as UserModel;

class Block extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, LogsActivity, PresentableTrait, UserModel;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'Core.block.block';

    /**
     * The blog_categories that belong to the blog.
     */
    public function category()
    {

        return $this->belongsTo('Core\Block\Models\Category', 'category_id');
    }

    public function user()
    {

        return $this->belongsTo('App\User', 'user_id');
    }


}
