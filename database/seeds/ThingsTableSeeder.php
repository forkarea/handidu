<?php

use Illuminate\Database\Seeder;

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
            DB::table('things')->insert([
                'image_url' => 'http://lorempixel.com/200/200/',
            ]);
        }
    }
}
