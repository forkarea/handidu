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
        Category::create(['name' => 'Wystrój domu', 'slug' => 'house']);
        Category::create(['name' => 'Okazjonalne', 'slug' => 'occasional']);
        Category::create(['name' => 'Ubrania', 'slug' => 'clothes']);
        Category::create(['name' => 'Biżuteria', 'slug' => 'jewellery']);
        Category::create(['name' => 'Zabawki', 'slug' => 'toys']);
        Category::create(['name' => 'Gadżety', 'slug' => 'gadgets']);
    }
}
