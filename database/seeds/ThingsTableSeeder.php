<?php

use Illuminate\Database\Seeder;
use App\Thing;

class ThingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10;$i++) {
            Thing::create([
                'name' => 'Rzecz',
                'description' => 'lorem ipsum',
                'slug' => 'rzecz-'.$i,
                'author_id' => 1
            ]);
        }
    }
}
