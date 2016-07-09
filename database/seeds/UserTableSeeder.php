<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
        	'name'=>'Animesh',
        	'email'=>'animesh.kuzur@outlook.com',
        	'password'=>bcrypt('animesh@1234'),
        	'CONT_ACC'=>'20426224',
            'phone' => '8298354467',
        ]);
 
    }
}
