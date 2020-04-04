<?php

return [

    /*
     * Provider.
     */
    'provider'   => 'Core',

    /*
     * Package.
     */
    'package'    => 'settings',

    /*
     * Modules.
     */
    'modules'    => ['setting'],

    'setting'    => [
        'model'         => 'Core\Settings\Models\Setting',
        'table'         => 'settings',
        'presenter'     => \Core\Settings\Repositories\Presenter\SettingPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'key', 'package', 'module', 'name', 'value', 'file', 'control', 'type'],
        'translate'     => ['key', 'package', 'module', 'name', 'value', 'file', 'control', 'type'],
        'upload_folder' => 'settings/setting',
        'uploads'       => [],
        'casts'         => [],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
        ],

    ],
    'file_paths' => [
        'company' => [
            'logo'     => 'image/logo.png',
            'logo.big' => 'image/logo_big.png',
        ],
    ],
];
