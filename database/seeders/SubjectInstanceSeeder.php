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
		'term_id' => '13',
		'version' => '1',
		]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '14',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '15',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '16',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '17',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '18',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '19',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '20',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '21',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '22',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '23',
		'version' => '1',
        ]);

		DB::table('subject_instance')->insert([
		'subject_id' => '1',
		'term_id' => '24',
		'version' => '1',
        ]);
        }
}