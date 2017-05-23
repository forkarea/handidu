<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryThingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_thing')->insert(['category_id' => 1, 'thing_id' => 2]);
        DB::table('category_thing')->insert(['category_id' => 1, 'thing_id' => 3]);
        DB::table('category_thing')->insert(['category_id' => 1, 'thing_id' => 4]);
        DB::table('category_thing')->insert(['category_id' => 2, 'thing_id' => 2]);
        DB::table('category_thing')->insert(['category_id' => 3, 'thing_id' => 5]);
    }
}
