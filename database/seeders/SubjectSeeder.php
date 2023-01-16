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
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1PGX',
            'name' => 'Programming Environments',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1CFX',
            'name' => 'Cloud Foundations',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1OFX',
            'name' => 'Object Oriented Programming Fundamentals',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1ISX',
            'name' => 'Information Systems',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2NFX',
            'name' => 'Network Engineering Fundamentals',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2DCX',
            'name' => 'Database Fundamentals on the Cloud',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1SPX',
            'name' => 'Sustainability Practices',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1SIX',
            'name' => 'Information System Infrastructure',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE1IOX',
            'name' => 'Intermediate Object Oriented Programming',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2ICX',
            'name' => 'Internet Client Engineering',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2CNX',
            'name' => 'Computer Networks',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2SDX',
            'name' => 'Information Systems Development',
        ]);

        DB::table('subjects')->insert([
            'code' => 'BUS2PMX',
            'name' => 'Project Management',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2VVX',
            'name' => 'Virtualisation for the Cloud',
        ]);

        DB::table('subjects')->insert([
            'code' => 'MAT2DMX',
            'name' => 'Discrete Mathematics for Computer Science',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2MAX',
            'name' => 'Mobile Application Development',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2OSX',
            'name' => 'Operating Systems',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2ADX',
            'name' => 'Application Development in the Cloud',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2CPX',
            'name' => 'Managing Projects in the Cloud',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2MLX',
            'name' => 'Machine Learning',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2SAX',
            'name' => 'Operating Systems Administration',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2ANX',
            'name' => 'Advanced Computer Networks',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE2WDX',
            'name' => 'Web Development',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3BGX',
            'name' => 'Big Data Management on the Cloud (Elective)',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3CIX',
            'name' => 'Computational Intelligence for Data Analysis (Elective)',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3CSX',
            'name' => 'Cybersecurity Fundamentals (Elective)',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3NWX',
            'name' => 'Networks, Systems and Web Security (Elective)',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3OTX',
            'name' => 'Internet of Things (Elective)',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3WSX',
            'name' => 'Wireless Network Engineering (Elective)',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3PAX',
            'name' => 'Industry Project 3A',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3PBX',
            'name' => 'Industry Project 3B',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3PEX',
            'name' => 'Profesional Environment',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3ACX',
            'name' => 'Architecting on the Cloud',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3SOX',
            'name' => 'System Operations on the Cloud',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3BDX',
            'name' => 'Big Data on the Cloud',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3PCX',
            'name' => 'Private Cloud Solutions',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3CAX',
            'name' => 'Industry Project for Cloud Technology 3A',
        ]);

        DB::table('subjects')->insert([
            'code' => 'CSE3CBX',
            'name' => 'Industry Project for Cloud Technology 3B',
        ]);
    }
}
