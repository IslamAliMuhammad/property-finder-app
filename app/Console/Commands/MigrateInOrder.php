<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateInOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_in_order {--r|reset : Rollback all database migrations } {--s|seed : Seed the database with records}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute the migrations in the order specified in the file app/Console/Comands/MigrateInOrder.php';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $migrations = [ 
            'database/migrations/2021_01_30_042603_create_governorates_table.php',
            'database/migrations/2021_01_30_042401_create_cities_table.php',
            'database/migrations/2014_10_12_000000_create_users_table.php',
            'database/migrations/2014_10_12_100000_create_password_resets_table.php',
            'database/migrations/2014_10_12_200000_add_two_factor_columns_to_users_table.php',
            'database/migrations/2019_08_19_000000_create_failed_jobs_table.php',
            'database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php',
            'database/migrations/2021_01_30_013754_create_sessions_table.php',
            'database/migrations/2021_01_31_060308_create_payment_options_table.php',
            'database/migrations/2021_01_31_083958_create_apartment_types_table.php',
            'database/migrations/2021_01_31_073505_create_apartments_table.php',
            'database/migrations/2021_01_31_064317_create_amenities_table.php',
            'database/migrations/2021_02_01_042233_create_apartment_amenity_table.php',
            'database/migrations/2021_01_31_081126_create_apartment_photos_table.php',
            'database/migrations/2021_03_05_192506_create_villa_types_table.php',
            'database/migrations/2021_03_05_183720_create_villas_table.php',
            'database/migrations/2021_03_05_191654_create_villa_photos_table.php',
            'database/migrations/2021_03_05_192255_create_villa_amenity_table.php',
            'database/migrations/2021_03_30_214634_create_land_types_table.php',
            'database/migrations/2021_03_30_212335_create_lands_table.php',
            'database/migrations/2021_03_30_213943_create_land_photos_table.php',
            ];

            $rollbackMigrations = $this->option('reset');
            if($rollbackMigrations){
                $this->call('migrate:reset');
            }
        
            foreach($migrations as $migration){
                $this->call('migrate', ['--path' => $migration]);
            }

            $seed = $this->option('seed');
            if($seed){
                $this->call('db:seed');
            }
    }
}

