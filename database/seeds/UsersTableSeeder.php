<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['cin' => 'R0252052', 'name' => 'BARRY Ibrahima', 'email' => 'ibarry@itelsys.ma',
        	'password' => bcrypt('ibarry'), 'tel' => '0604135679', 'address' => 'Hassan, Rabat', 'groupe_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
        	]);
    }
}
