<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permission_roles')->insert(['permission_id' => 1, 'role_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('permission_roles')->insert(['permission_id' => 2, 'role_id' => 1, 'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()]);
        DB::table('permission_roles')->insert(['permission_id' => 3, 'role_id' => 1, 'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()]);
        DB::table('permission_roles')->insert(['permission_id' => 4, 'role_id' => 1, 'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()]);
    }
}
