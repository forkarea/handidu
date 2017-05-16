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
        Category::create(['name' => 'Wystrój domu']);
        Category::create(['name' => 'Okazjonalne']);
        Category::create(['name' => 'Ubrania']);
        Category::create(['name' => 'Biżuteria']);
        Category::create(['name' => 'Zabawki']);
        Category::create(['name' => 'Gadżety']);
    }
}
