<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenresSeeds::class);
        $this->call(AuthorsSeeder::class);
        $this->call(ContinuationsSeeder::class);
    }
}
