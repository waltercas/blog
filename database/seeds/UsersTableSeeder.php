<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('users')->truncate();
        factory(App\User::class, 29)->create();

        App\User::create([
            'name'      =>'Walter Castillo',
            'email'     =>'waltercastillo@live.com.ar',
            'password'  =>bcrypt('123'),
        ]);

       
    }
}
