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
        for($i=0; $i<10;$i++) {
            Thing::create([
                'image_url' => 'http://lorempixel.com/200/200/',
                'author_id' => 1
            ]);
        }
    }
}
