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
        DB::table('users')->insert(['name' => 'BARRY Ibrahima', 'email' => 'ibarry@itelsys.ma',
        	'password' => bcrypt('ibarry'), 'groupe_id' => 1, 'role_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
        	]);
    }
}
