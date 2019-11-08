<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Quang Duc';
        $user->email = 'Duc@gmail.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user = new User();
        $user->name = 'Tran Huy';
        $user->email = 'Huy@gmail.com';
        $user->password = Hash::make('123456789');
        $user->save();

        $user = new User();
        $user->name = 'ThuyHang';
        $user->email = 'Hang@gmail.com';
        $user->password = Hash::make('123456789');
        $user->save();


    }
}
