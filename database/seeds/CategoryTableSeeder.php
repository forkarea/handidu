<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'house', 'slug' => 'house']);
        Category::create(['name' => 'occasional', 'slug' => 'occasional']);
        Category::create(['name' => 'clothes', 'slug' => 'clothes']);
        Category::create(['name' => 'jewellery', 'slug' => 'jewellery']);
        Category::create(['name' => 'toys', 'slug' => 'toys']);
        Category::create(['name' => 'gadgets', 'slug' => 'gadgets']);
    }
}
