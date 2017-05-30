<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10;$i++) {
            Photo::create([
                'filename' => 'http://lorempixel.com/200/200/fashion/'.$i.'/',
                'photoholdable_id' => $i,
                'photoholdable_type' => 'App\Thing'
            ]);
        }
    }
}
