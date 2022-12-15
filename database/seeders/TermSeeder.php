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
		'month' => 'JAN',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'FEB',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'MAR',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'APR',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'MAY',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'JUN',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'JUL',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'AUG',
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'SEP',
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'OCT',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'NOV',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'DEC',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'JAN',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'FEB',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'MAR',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'APR',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'MAY',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'JUN',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'JUL',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'AUG',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'SEP',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'OCT',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'NOV',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'DEC',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
