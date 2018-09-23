<?php

use App\Player;
use App\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->truncate();

        foreach (Team::all() as $team) {
            factory(Player::class, 25)->create()->each(function ($player) use ($team) {
                $player->update(['team_id' => $team->id]);
            });
        }
    }
}
