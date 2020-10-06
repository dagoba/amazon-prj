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
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'corporation.amz@gmail.com',
            'password'=>bcrypt('wfcd3234fd'),
            'group'=>1,
            'verified'=>TRUE,
            'affiliate_id'=>str_random(10),
        ]);
    }
}
