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
		'month' => 'January',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'February',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'March',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'April',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'May',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'June',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'July',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'August',
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'September',
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'October',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'November',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2021',
		'month' => 'December',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'January',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'February',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'March',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'April',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'May',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'June',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'July',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'August',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'September',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'October',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'November',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

		DB::table('terms')->insert([
		'year' => '2022',
		'month' => 'December',
		'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
