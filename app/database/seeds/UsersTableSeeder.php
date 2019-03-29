<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
/**
* Agregamos un usuario nuevo a la base de datos.
*/
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'  => 'admin',
            'name' => Str::random(10),
            'email' => 'diego.herrera@velezcaicedo.com',
            'password' => Hash::make('admin')]);
    }
}