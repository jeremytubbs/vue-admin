<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Category as Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Art';
        $category->slug = 'Art';
        $category->description = 'Art Project';
        $category->save();

        $category = new Category();
        $category->name = 'Business';
        $category->slug = 'Business';
        $category->description = 'Business Project';
        $category->save();

        $category = new Category();
        $category->name = 'Employer';
        $category->slug = 'Employer';
        $category->description = 'Employer Project';
        $category->save();

    }
}
