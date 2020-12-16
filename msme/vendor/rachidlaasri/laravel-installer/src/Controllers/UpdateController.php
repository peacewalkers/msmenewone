<?php

namespace RachidLaasri\LaravelInstaller\Controllers;

use App\Setting;
use Illuminate\Routing\Controller;
use RachidLaasri\LaravelInstaller\Helpers\DatabaseManager;
use RachidLaasri\LaravelInstaller\Helpers\InstalledFileManager;

class UpdateController extends Controller
{
    use \RachidLaasri\LaravelInstaller\Helpers\MigrationsHelper;

    /**
     * Display the updater welcome page.
     *
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        /**
         * start my custom code, clear all laravel cache before update.
         */
        $settings = Setting::find(1);

        if(empty($settings->setting_site_last_cached_at))
        {
            clear_website_cache();
        }
        else
        {
            clear_website_cache();
            generate_website_route_cache();
            generate_website_view_cache();
        }
        /**
         * end my custom code, clear all laravel cache before update.
         */

        return view('vendor.installer.update.welcome');
    }

    /**
     * Display the updater overview page.
     *
     * @return \Illuminate\View\View
     */
    public function overview()
    {
        $migrations = $this->getMigrations();
        $dbMigrations = $this->getExecutedMigrations();

        return view('vendor.installer.update.overview', ['numberOfUpdatesPending' => count($migrations) - count($dbMigrations)]);
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database()
    {
        $databaseManager = new DatabaseManager;
        $response = $databaseManager->migrateAndSeed();

        return redirect()->route('LaravelUpdater::final')
                         ->with(['message' => $response]);
    }

    /**
     * Update installed file and display finished view.
     *
     * @param InstalledFileManager $fileManager
     * @return \Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager)
    {
        $fileManager->update();

        return view('vendor.installer.update.finished');
    }
}
