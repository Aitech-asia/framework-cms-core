<?php

namespace Core\Filer;

use App;
use Core\Filer\Traits\FileDisplay;
use Core\Filer\Traits\Uploader;

class Filer
{
    use FileDisplay, Uploader;

    public function __construct()
    {
        $this->image = App::make('image');
    }
}
