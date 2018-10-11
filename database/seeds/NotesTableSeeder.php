<?php

use App\Note;
use Illuminate\Database\Seeder;
use App\Http\Middleware\SetGuidCookie;

class NotesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->truncate();

        for ($i = 0; $i < 4; $i++) {
            factory(Note::class, rand(3, 8))->create(['guid' => SetGuidCookie::generate()]);
        }
    }
}
