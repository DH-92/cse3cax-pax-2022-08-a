<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 
class SubjectInstanceSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
	 
       public function run()
    {
        DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '1',
		'version' => '1',
		]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '2',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '3',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '4',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '5',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '6',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '7',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '8',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '9',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '10',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '11',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '12',
		'version' => '1',
        ]);
        }
}