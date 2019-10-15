<?php

use App\Model\Category;
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
        $category = new Category();
        $category->name = 'Nhạc trẻ';
        $category->description = 'Nhạc Việt Nam';
        $category->save();

        $category = new Category();
        $category->name = 'Trữ tình';
        $category->description = 'Nhạc Việt Nam';
        $category->save();

        $category = new Category();
        $category->name = 'Remix Việt';
        $category->description = 'Nhạc Việt Nam';
        $category->save();

        $category = new Category();
        $category->name = 'Rap Việt';
        $category->description = 'Nhạc Việt Nam';
        $category->save();

        $category = new Category();
        $category->name = 'Tiền chiến';
        $category->description = 'Nhạc Việt Nam';
        $category->save();

        $category = new Category();
        $category->name = 'Nhạc trịnh';
        $category->description = 'Nhạc Việt Nam';
        $category->save();

        $category = new Category();
        $category->name = 'Rock Việt';
        $category->description = 'Nhạc Việt Nam';
        $category->save();

        $category = new Category();
        $category->name = 'Cách mạng';
        $category->description = 'Nhạc Việt Nam';
        $category->save();

        $category = new Category();
        $category->name = 'Pop';
        $category->description = 'Nhạc Âu Mỹ';
        $category->save();

        $category = new Category();
        $category->name = 'Rock';
        $category->description = 'Nhạc Âu Mỹ';
        $category->save();

        $category = new Category();
        $category->name = 'Dance/Electronic';
        $category->description = 'Nhạc Âu Mỹ';
        $category->save();

        $category = new Category();
        $category->name = 'R&B/HipHop/Rap';
        $category->description = 'Nhạc Âu Mỹ';
        $category->save();

        $category = new Category();
        $category->name = 'Blue/Jazz';
        $category->description = 'Nhạc Âu Mỹ';
        $category->save();

        $category = new Category();
        $category->name = 'Country';
        $category->description = 'Nhạc Âu mỹ';
        $category->save();

        $category = new Category();
        $category->name = 'Âu mỹ khác';
        $category->description = 'Nhạc Âu Mỹ';
        $category->save();

        $category = new Category();
        $category->name = 'Nhạc Hoa';
        $category->description = 'Nhạc Châu Á';
        $category->save();

        $category = new Category();
        $category->name = 'Nhạc Hàn';
        $category->description = 'Nhạc Châu Á';
        $category->save();

        $category = new Category();
        $category->name = 'Nhạc Nhật';
        $category->description = 'Nhạc Châu Á';
        $category->save();

        $category->save();$category = new Category();
        $category->name = 'Nhạc Thái';
        $category->description = 'Nhạc Châu Á';
        $category->save();

        $category = new Category();
        $category->name = 'Nhạc Thiết Nhi';
        $category->description = 'Khác';
        $category->save();

        $category = new Category();
        $category->name = 'Nhạc Không Lời';
        $category->description = 'Khác';
        $category->save();

        $category = new Category();
        $category->name = 'Beat';
        $category->description = 'Khác';
        $category->save();

        $category = new Category();
        $category->name = 'Tôi hát';
        $category->description = 'Khác';
        $category->save();

        $category = new Category();
        $category->name = 'Thể loại khác';
        $category->description = 'Khác';
    }
}
