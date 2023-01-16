<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $years = [
            2021,
            2022,
            2023,
        ];

        $months = [
            'JAN',
            'FEB',
            'MAR',
            'APR',
            'MAY',
            'JUN',
            'JUL',
            'AUG',
            'SEP',
            'OCT',
            'NOV',
            'DEC',
        ];
        $now = Carbon::now()->format('Y-m-d H:i:s');
        foreach ($years as $year) {
            foreach ($months as $month) {
                DB::table('terms')->insert([
                    'year' => $year,
                    'month' => $month,
                    'created_at' => $now,
                ]);
            }
        }
    }
}
