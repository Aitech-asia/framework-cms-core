<?php

namespace Core\Install\Http\Controllers;

use App\Http\Controllers\PublicController;
use RachidLaasri\LaravelInstaller\Helpers\DatabaseManager;

class DatabaseController extends PublicController
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database()
    {
        $response = $this->databaseManager->migrateAndSeed();

        return redirect()->route('LaravelInstaller::final')
                         ->with(['message' => $response]);
    }
}
