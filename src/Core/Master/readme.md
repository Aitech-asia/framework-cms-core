laravel package that provides master management facility for the cms.

## Installation

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `Core/master`.

    "Core/master": "dev-master"

Next, update Composer from the Terminal:

    composer update

Once this operation completes execute below cammnds in command line to finalize installation.

    Core\Master\Providers\MasterServiceProvider::class,

And also add it to alias

    'Master'  => Core\Master\Facades\Master::class,

## Publishing files and migraiting database.

**Migration and seeds**

    php artisan migrate
    php artisan db:seed --class=Core\\MasterTableSeeder

**Publishing configuration**

    php artisan vendor:publish --provider="Core\Master\Providers\MasterServiceProvider" --tag="config"

**Publishing language**

    php artisan vendor:publish --provider="Core\Master\Providers\MasterServiceProvider" --tag="lang"

**Publishing views**

    php artisan vendor:publish --provider="Core\Master\Providers\MasterServiceProvider" --tag="view"


## Usage


