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
        User::create(['first_name' => 'Piotr', 'last_name' => 'Piątkiewicz', 'email' => 'piatkiewicz.piotr@gmail.com', 'password' => bcrypt('secret')]);
    }
}
