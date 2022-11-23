<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
	 
       public function run()
    {
        User::table('terms')->insert([
		'year' => '2021',
		'month' => 'January',
        ]
		[
		'year' => '2021',
		'month' => 'Febuary',
        ]
		[
		'year' => '2021',
		'month' => 'March',
        ]
		[
		'year' => '2021',
		'month' => 'April',
        ]
		[
		'year' => '2021',
		'month' => 'May',
        ]
		[
		'year' => '2021',
		'month' => 'June',
        ]
		[
		'year' => '2021',
		'month' => 'July',
        ]
		[
		'year' => '2021',
		'month' => 'August',
        ]
		[
		'year' => '2021',
		'month' => 'September',
        ]
		[
		'year' => '2021',
		'month' => 'October',
        ]
		[
		'year' => '2021',
		'month' => 'November',
        ]
		[
		'year' => '2021',
		'month' => 'December',
        ]
		[
		'year' => '2022',
		'month' => 'January',
        ]
		[
		'year' => '2022',
		'month' => 'Febuary',
        ]
		[
		'year' => '2022',
		'month' => 'March',
        ]
		[
		'year' => '2022',
		'month' => 'April',
        ]
		[
		'year' => '2022',
		'month' => 'May',
        ]
		[
		'year' => '2022',
		'month' => 'June',
        ]
		[
		'year' => '2022',
		'month' => 'July',
        ]
		[
		'year' => '2022',
		'month' => 'August',
        ]
		[
		'year' => '2022',
		'month' => 'September',
        ]
		[
		'year' => '2022',
		'month' => 'October',
        ]
		[
		'year' => '2022',
		'month' => 'November',
        ]
		[
		'year' => '2022',
		'month' => 'December',
        ]
		);
    }
}