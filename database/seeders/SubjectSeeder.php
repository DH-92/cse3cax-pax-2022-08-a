<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'code' => 'CSE1ITX',
            'name' => 'Information Technology Fundamentals',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1PGX',
            'name' => 'Programming Environments',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1CFX',
            'name' => 'Cloud Foundations',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1OFX',
            'name' => 'Object Oriented Programming Fundamentals',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1ISX',
            'name' => 'Information Systems',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2NFX',
            'name' => 'Network Engineering Fundamentals',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2DCX',
            'name' => 'Database Fundamentals on the Cloud',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1SPX',
            'name' => 'Sustainability Practices',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1SIX',
            'name' => 'Information System Infrastructure',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1IOX',
            'name' => 'Intermediate Object Oriented Programming',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2ICX',
            'name' => 'Internet Client Engineering',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2CNX',
            'name' => 'Computer Networks',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2SDX',
            'name' => 'Information Systems Development',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'BUS2PMX',
            'name' => 'Project Management',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2VVX',
            'name' => 'Virtualisation for the Cloud',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'MAT2DMX',
            'name' => 'Discrete Mathematics for Computer Science',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2MAX',
            'name' => 'Mobile Application Development',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2OSX',
            'name' => 'Operating Systems',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2ADX',
            'name' => 'Application Development in the Cloud',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2CPX',
            'name' => 'Managing Projects in the Cloud',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2MLX',
            'name' => 'Machine Learning',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2SAX',
            'name' => 'Operating Systems Administration',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2ANX',
            'name' => 'Advanced Computer Networks',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2WDX',
            'name' => 'Web Development',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3BGX',
            'name' => 'Big Data Management on the Cloud (Elective)',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3CIX',
            'name' => 'Computational Intelligence for Data Analysis (Elective)',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3CSX',
            'name' => 'Cybersecurity Fundamentals (Elective)',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3NWX',
            'name' => 'Networks, Systems and Web Security (Elective)',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3OTX',
            'name' => 'Internet of Things (Elective)',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3WSX',
            'name' => 'Wireless Network Engineering (Elective)',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3PAX',
            'name' => 'Industry Project 3A',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3PBX',
            'name' => 'Industry Project 3B',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3PEX',
            'name' => 'Profesional Environment',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3ACX',
            'name' => 'Architecting on the Cloud',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3SOX',
            'name' => 'System Operations on the Cloud',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3BDX',
            'name' => 'Big Data on the Cloud',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3PCX',
            'name' => 'Private Cloud Solutions',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3CAX',
            'name' => 'Industry Project for Cloud Technology 3A',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3CBX',
            'name' => 'Industry Project for Cloud Technology 3B',
            'color' => '#'.dechex(random_int(100, 250)).dechex(random_int(100, 250)).dechex(random_int(100, 250)),
        ]);
    }
}
