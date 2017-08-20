<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //categories seed
        $category = new Category;
        $category->name = 'Academic';
        $category->save();

        $category = new Category;
        $category->name = 'Career';
        $category->save();
        
        $category = new Category;
        $category->name = 'Financial';
        $category->save();
        
        $category = new Category;
        $category->name = 'Personal';
        $category->save();

        $category = new Category;
        $category->name = 'Practical';
        $category->save();

        $category = new Category;
        $category->name = 'Social';
        $category->save();

    }
}
