<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        User::create([
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'bio' => 'admin',
            'phone_number' => 18916550105,
            'sex' => true,
            'company' => 'BAT',
            'job' => 'Developer',
            'role_level' => 9
        ]);

        factory(User::class, 50)->create();

    }
}
