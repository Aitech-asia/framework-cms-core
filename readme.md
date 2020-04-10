# Laravel CMS Framework

This repository contains the core library of Laravel CMS Framework. If you want to build a cms using laravel.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json`.

    "doquangthanh/framework-cms-core": "^1.1"

Next, update Composer from the Terminal:

    composer update

Once this operation completes, the final step is to add the service provider and page alias. Open `app/config/app.php`, and add a new item to the providers array.

```php
        Core\Activities\ActivitiesServiceProvider::class,
        Core\Filer\FilerServiceProvider::class,
        Core\Form\FormServiceProvider::class,
        Core\Hashids\HashidsServiceProvider::class,
        Core\Install\InstallServiceProvider::class,
        Core\Master\MasterServiceProvider::class,
        Core\Menu\MenuServiceProvider::class,
        Core\Roles\RolesServiceProvider::class,
        Core\Settings\SettingsServiceProvider::class,
        Core\Theme\ThemeServiceProvider::class,
        Core\Trans\TransServiceProvider::class,
        Core\User\UserServiceProvider::class,
        Core\Page\PageServiceProvider::class,
        Core\Block\BlockServiceProvider::class,
```

And also add it to alias

```php
        'Activities'   => Core\Support\Facades\Activities::class,
        'Calendar'     => Core\Calendar\Facades\Calendar::class,
        'Captcha'      => Core\Support\Facades\Captcha::class,
        'Filer'        => Core\Support\Facades\Filer::class,
        'Form'         => Core\Support\Facades\Form::class,
        'Hashids'      => Core\Support\Facades\Hashids::class,
        'Menu'         => Core\Support\Facades\Menu::class,
        'Message'      => Core\Message\Facades\Message::class,
        'Role'         => Core\Support\Facades\Role::class,
        'Settings'     => Core\Support\Facades\Settings::class,
        'Task'         => Core\Task\Facades\Task::class,
        'Theme'        => Core\Support\Facades\Theme::class,
        'Trans'        => Core\Support\Facades\Trans::class,
        'User'         => Core\Support\Facades\User::class,
        'Page'         => Core\Support\Facades\Page::class,
        'Block'         => Core\Support\Facades\Block::class,
```


Open `database/seeds/DatabaseSeeder.php`, and add a new item to function run().

```php
        $this->call(Core\MenuTableSeeder::class);
        $this->call(Core\UserTableSeeder::class);
        $this->call(Core\RoleTableSeeder::class);
        $this->call(Core\TeamTableSeeder::class);

        $this->call(Core\ClientTableSeeder::class);
        $this->call(Core\SettingTableSeeder::class);
        $this->call(Core\BlockTableSeeder::class);
        $this->call(Core\PageTableSeeder::class);

```

Next, run terminal 

    php artisan migrate
    php artisan db:seed
    