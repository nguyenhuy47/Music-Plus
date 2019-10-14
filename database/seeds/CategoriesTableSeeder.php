<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Model\Category();
        $category->name = 'Nhạc trẻ';
        $category->description = 'Nhạc cho giới trẻ';
        $category->save();
    }
}
