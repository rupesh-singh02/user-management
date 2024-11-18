<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;

class SetupDatabase extends Command
{
    protected $signature = 'setup:database';
    protected $description = 'Ensure the database exists and run migrations and seeders';

    public function handle()
    {
        $databaseName = Config::get('database.connections.mysql.database');

        if ($databaseName) {
            Config::set('database.connections.mysql.database', null);
            DB::purge('mysql');

            try {
                $databaseExists = DB::select("SHOW DATABASES LIKE ?", [$databaseName]);

                if (empty($databaseExists)) {
                    DB::statement("CREATE DATABASE `$databaseName`");
                    $this->info("Database '$databaseName' created successfully.");
                } else {
                    $this->info("Database '$databaseName' already exists.");
                }

                Config::set('database.connections.mysql.database', $databaseName);
                DB::purge('mysql');

                // Run migrations and seeders
                Artisan::call('migrate --force');
                Artisan::call('db:seed --force');
                $this->info("Migrations and seeders executed successfully.");
            } catch (\Exception $e) {
                $this->error("Error: " . $e->getMessage());
            }
        }
    }
}
