<?php

namespace Core\Install;

use Illuminate\Console\Command;
use Core\Install\Installers\Installer;
use Core\Install\Installers\Traits\BlockMessage;
use Core\Install\Installers\Traits\SectionMessage;

class InstallCommand extends Command
{
    use BlockMessage, SectionMessage;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:install {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install laravel';

    /**
     * @var Installer
     */
    private $installer;

    /**
     * Create a new command instance.
     *
     * @param Installer $installer
     *
     * @internal param Filesystem $finder
     * @internal param Application $app
     * @internal param Composer $composer
     */
    public function __construct(Installer $installer)
    {
        parent::__construct();
        $this->getLaravel()['env'] = 'local';
        $this->installer = $installer;
    }

    /**
     * Execute the actions.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->alert('laravel Installation');

        $success = $this->installer->stack([
            \Core\Install\Installers\Scripts\ProtectInstaller::class,
            \Core\Install\Installers\Scripts\ConfigureDatabase::class,
            \Core\Install\Installers\Scripts\PackgeAssets::class,
            \Core\Install\Installers\Scripts\PackageMigrators::class,
            \Core\Install\Installers\Scripts\PackageSeeders::class,
            \Core\Install\Installers\Scripts\SetSuperuserUser::class,
            \Core\Install\Installers\Scripts\SetAppKey::class,
        ])->install($this);

        if ($success) {
            $this->line('laravel is ready.');
            $this->info('You can now login with your username and password at ['.url('/admin').']');
        }
    }
}
