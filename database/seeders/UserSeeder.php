<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $userTypes = [
            'lecturer' => 0,
            'manager' => 1,
            'admin' => 2,
        ];

        $maxLoadToEmploymentType = [
            '1' => 'Full-time',
            '0.8' => 'Semi-part-time',
            '0.6' => 'Part-time',
            '0.4' => 'Casual',
            '0' => 'Full-time',
        ];

        //lecturers and loads from the initial scheduleSummaries.xlxs file
        $lecturers = [
            'Acacia' => '1',
            'Beech' => '1',
            'Cypress' => '1',
            'Douglas' => '0.8',
            'Eucalypt' => '0.4',
            'Flame' => '1',
            'Guava' => '0.6',
            'Hickory' => '0.8',
            'Ironbark' => '1',
            'Jacaranda' => '0.4',
            'Karri' => '1',
            'Laurel' => '1',
            'Maple' => '1',
            'lecturer' => '0',
        ];

        foreach ($lecturers as $firstName => $maxLoad) {
            DB::table('users')->insert([
                'firstName' => $firstName,
                'email' => $firstName.'@ltu.edu.au',
                'userType' => $userTypes['lecturer'],
                'maxLoad' => $maxLoad,
                'employmentType' => $maxLoadToEmploymentType[$maxLoad],
                'phone' => '04'.random_int(10000000, 99999999),
                'password' => Hash::make('password'),
                'color' => '#'
                    .dechex(random_int(100, 250))
                    .dechex(random_int(100, 250))
                    .dechex(random_int(100, 250)),
            ]);
        }

        DB::table('users')->insert([
            'firstName' => 'Manager',
            'email' => 'manager@ltu.edu.au',
            'userType' => $userTypes['manager'],
            'maxLoad' => '0',
            'employmentType' => 'Full-time',
            'phone' => '04'.random_int(10000000, 99999999),
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Admin',
            'email' => 'admin@ltu.edu.au',
            'userType' => $userTypes['admin'],
            'maxLoad' => '0',
            'employmentType' => 'Full-time',
            'phone' => '04'.random_int(10000000, 99999999),
            'password' => Hash::make('password'),
        ]);
    }
}
