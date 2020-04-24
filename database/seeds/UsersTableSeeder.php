<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email','sergio@teste.com')->first();

        if(!$user){
            User::create([
                'name' => 'Sergio',
                'email' => 'sergio@teste.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ]);
        }else{
            if($user->role != 'admin'){
                $user->role = 'admin';
                $user->save();
            }
        }
    }
}
