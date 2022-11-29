<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
 
class TermSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
	 
       public function run()
    {
        DB::table('terms')->insert([
		'year' => '2021',
		'month' => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '2',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '3',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '4',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '5',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '6',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '7',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '8',
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '9',
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '10',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '11',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => '12',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '1',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '2',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '3',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '4',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '5',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '6',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '7',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '8',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '9',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '10',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '11',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => '12',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
