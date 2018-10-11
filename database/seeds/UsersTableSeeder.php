<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        # super user
        $user = User::firstOrCreate(
            ['email' => 'super@notepad.test'],
            ['name' => 'SUPER', 'password' => bcrypt('secret')]
        );
        $user->update([
            'password' => bcrypt('secret')
        ]);
    }
}
