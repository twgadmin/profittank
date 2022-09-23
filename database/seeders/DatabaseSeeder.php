<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(ChannelTableSeeder::class);
        $this->call(SiteSettingsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(PlansTableSeeder::class);
    }
}
