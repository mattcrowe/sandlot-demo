<?php

use App\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class, 30)->create()->each(function ($team) {

        });
    }
}
