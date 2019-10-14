<?php

use App\Model\Artist;
use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artist = new Artist();
        $artist->name = 'Huy Tuấn';
        $artist->dob = '1990/01/02';
        $artist->story = 'quê ở đâu đó';
        $artist->save();
    }
}
