<?php

use App\Model\Singer;
use Illuminate\Database\Seeder;

class SingersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $singer = new Singer();
        $singer->name = 'Huy Tuấn';
        $singer->dob = '1990/01/02';
        $singer->story = 'quê ở đâu đó';
        $singer->save();
    }
}
