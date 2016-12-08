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
        DB::table('ql64_users')->insert(
        	[
        		[
	            	'username' => 'sub-admin',
	            	'password' => bcrypt('12345'),
	            	'level'		=> 1,
	            	'created_at'=> new DateTime(),
	        	],
	        	[
	            	'username' => 'admin',
	            	'password' => bcrypt('12345'),
	            	'level'		=> 1,
	            	'created_at'=> new DateTime(),
	        	],
	        	[
	            	'username' => 'member',
	            	'password' => bcrypt('12345'),
	            	'level'		=> 2,
	            	'created_at'=> new DateTime(),
	        	],
	        	[
	            	'username' => 'user',
	            	'password' => bcrypt('12345'),
	            	'level'		=> 2,
	            	'created_at'=> new DateTime(),
	        	]
        	]
        );
    }
}
