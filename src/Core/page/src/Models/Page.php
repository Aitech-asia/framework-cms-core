<?php

namespace Core\Page\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Core\Activities\Traits\LogsActivity;
use Core\Database\Model;
use Core\Database\Traits\Slugger;
use Core\Filer\Traits\Filer;
use Core\Hashids\Traits\Hashids;
use Core\Trans\Traits\Translatable;

class Page extends Model
{
    use Filer, SoftDeletes, Hashids, Slugger, Translatable, LogsActivity;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'Core.page.page';

    // /**
    //  * Set the pages title and heading.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        if (empty($this->attributes['title'])) {
            $this->attributes['title'] = $value;
        }

        if (empty($this->attributes['meta_title'])) {
            $this->attributes['meta_title'] = $value;
        }

        if (empty($this->attributes['heading'])) {
            $this->attributes['heading'] = $value;
        }

        if (empty($this->attributes['sub_heading'])) {
            $this->attributes['sub_heading'] = $value;
        }

    }

}
