<?php

namespace Core\Settings\Models;

use Core\Database\Model;
use Core\Filer\Traits\Filer;
use Core\Repository\Traits\PresentableTrait;

class Setting extends Model
{
    use Filer,  PresentableTrait;

    /**
     * Configuartion for the model.
     *
     * @var array
     */
    protected $config = 'settings.setting';
}
