<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Model\Category;
use App\Model\CommentList;
use App\Model\Song;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Song::class, function (Faker $faker) {

    $dir = '/';
    $recursive = false; // Có lấy file trong các thư mục con không?
    $contents = collect(Storage::cloud()->listContents($dir, $recursive));
    $dataJson = $contents->where('type', '=', 'file');
    $datas = json_decode($dataJson);
    $pathData = [];
    foreach ($datas as $data){
        array_push($pathData,$data->path);
    }

//    $users = User::all('id');
//    $userId = [];
//    foreach ($users as $user){
//        array_push($userId,$user->id);
//    }


    return [
        'name' => $faker->word,
        'file_name' => 'https://www.nhaccuatui.com/bai-hat/20-nam-tinh-dep-mua-chom-chom-vu-linh.BdIiwsZtVm.html',
        'path' => $pathData[random_int(0,count($pathData)-1)] ,
        'image' => 'https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg',
        'category_id' => random_int(1, count(Category::all('id'))),
        'lyric' => $faker->paragraph,
        'size' => $faker->randomFloat(2, 1000, 2000),
//        'user_id' => $userId[random_int(0,count($userId)-1)],
        'user_id' => random_int((User::min('id')),User::max('id')),

//        'comment_list_id' => random_int(1, count(CommentList::all('id')))
    ];
});
