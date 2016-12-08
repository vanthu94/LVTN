<?php

use Illuminate\Database\Seeder;

class DetaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ql64_detai')->insert(
        	[
        		[
	            	'tendt' 	=> 'abcabc',
	            	'tgbd' 		=> date('2016-11-01'),
	            	'tgkt'		=> date('2016-11-30'),
	            	'yeucau'	=> 'aaaaaaaa',
	            	'noidung'	=> 'aaaaaaaaaaabbbbbbbbb',
	            	'filenoidung'=> 'txt',
	            	'filenhanxet'=> 'txt',
	            	'statusdt'	=> 0,
	            	'created_at'=> new DateTime(),
	        	],
	        	// [
	         //    	'tendt' 	=> '',
	         //    	'tgbd' 		=> '',
	         //    	'tgkt'		=> '',
	         //    	'yeucau'	=> '',
	         //    	'noidung'	=> '',
	         //    	'filenoidung'=> '',
	         //    	'filenhanxet'=> '',
	         //    	'statusdt'	=> 0,
	         //    	'created_at'=> new DateTime(),
	        	// ]
        	]
        );
    }
}
