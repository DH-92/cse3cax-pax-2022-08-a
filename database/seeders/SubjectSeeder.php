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
        Subject::table('subjects')->insert([
			'code' => 'CSE1ITX',
			'name'  => 'Information Technology Fundamentals',
		]);

		Subject::table('subjects')->insert([
			'code' => 'CSE1PGX',
			'name'  => 'Programming Environments',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE1CFX',
			'name'  => 'Cloud Foundations',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE1OFX',
			'name'  => 'Object Oriented Programming Fundamentals',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE1ISX',
			'name'  => 'Information Systems',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2NFX',
			'name'  => 'Network Engineering Fundamentals',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2DCX',
			'name'  => 'Database Fundamentals on the Cloud',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE1SPX',
			'name'  => 'Sustainability Practices',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE1IOX',
			'name'  => 'Intermediate Object Oriented Programming',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2ICX',
			'name'  => 'Internet Client Engineering',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2CNX',
			'name'  => 'Computer Networks',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2SDX',
			'name'  => 'Information Systems Development',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'BUS2PMX',
			'name'  => 'Project Management',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2VVX',
			'name'  => 'Virtualisation for the Cloud',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'MAT2DMX',
			'name'  => 'Discrete Mathematics for Computer Science',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2MAX',
			'name'  => 'Mobile Application Development',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2OSX',
			'name'  => 'Operating Systems',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2ADX',
			'name'  => 'Application Development in the Cloud',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2CPX',
			'name'  => 'Managing Projects in the Cloud',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2MLX',
			'name'  => 'Machine Learning',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2SAX',
			'name'  => 'Operating Systems Administration',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2ANX',
			'name'  => 'Advanced Computer Networks',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE2WDX',
			'name'  => 'Web Development',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3BGX',
			'name'  => 'Big Data Management on the Cloud (Elective)',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3CIX',
			'name'  => 'Computational Intelligence for Data Analysis (Elective)',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3CSX',
			'name'  => 'Cybersecurity Fundamentals (Elective)',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3NWX',
			'name'  => 'Networks, Systems and Web Security (Elective)',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3OTX',
			'name'  => 'Internet of Things (Elective)',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3WSX',
			'name'  => 'Wireless Network Engineering (Elective)',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3PAX',
			'name'  => 'Industry Project 3A',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3PBX',
			'name'  => 'Industry Project 3B',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3PEX',
			'name'  => 'Profesional Environment',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3ACX',
			'name'  => 'Architecting on the Cloud',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3SOX',
			'name'  => 'System Operations on the Cloud',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3BDX',
			'name'  => 'Big Data on the Cloud',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3PCX',
			'name'  => 'Private Cloud Solutions',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3CAX',
			'name'  => 'Industry Project for Cloud Technology 3A',
        ]);

		Subject::table('subjects')->insert([
			'code' => 'CSE3CBX',
			'name'  => 'Industry Project for Cloud Technology 3B',
        ]);
    }
}