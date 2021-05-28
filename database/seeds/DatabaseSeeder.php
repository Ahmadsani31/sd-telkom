<?php

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
        $this->call(DummyUserSeeder::class);
        $this->call(DummyOrtuSeeder::class);
        $this->call(DummyAlquranSeeder::class);
    }
}
