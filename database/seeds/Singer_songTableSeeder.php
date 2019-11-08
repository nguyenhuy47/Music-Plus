<?php

use App\Model\Singer;
use Illuminate\Database\Seeder;

class Singer_songTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $singers = Singer::all('id');
        $singerIds = [];
        foreach ($singers as $singer){
            array_push($singerIds,$singer->id);
        }

    }
}
