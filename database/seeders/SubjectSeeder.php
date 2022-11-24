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
        User::table('subjects')->insert([
			'code' => 'CSE1ITX',
			'name'  => 'Information Technology Fundamentals',
        ]
		[
			'code' => 'CSE1PGX',
			'name'  => 'Programming Environments',
        ]
		[
			'code' => 'CSE1CFX',
			'name'  => 'Cloud Foundations',
        ]
		[
			'code' => 'CSE1OFX',
			'name'  => 'Object Oriented Programming Fundamentals',
        ]
		[
			'code' => 'CSE1ISX',
			'name'  => 'Information Systems',
        ]
		[
			'code' => 'CSE2NFX',
			'name'  => 'Network Engineering Fundamentals',
        ]
		[
			'code' => 'CSE2DCX',
			'name'  => 'Database Fundamentals on the Cloud',
        ]
		[
			'code' => 'CSE1SPX',
			'name'  => 'Sustainability Practices',
        ]
		[
			'code' => 'CSE1IOX',
			'name'  => 'Intermediate Object Oriented Programming',
        ]
		[
			'code' => 'CSE2ICX',
			'name'  => 'Internet Client Engineering',
        ]
		[
			'code' => 'CSE2CNX',
			'name'  => 'Computer Networks',
        ]
		[
			'code' => 'CSE2SDX',
			'name'  => 'Information Systems Development',
        ]
		[
			'code' => 'BUS2PMX',
			'name'  => 'Project Management',
        ]
		[
			'code' => 'CSE2VVX',
			'name'  => 'Virtualisation for the Cloud',
        ]
		[
			'code' => 'MAT2DMX',
			'name'  => 'Discrete Mathematics for Computer Science',
        ]
		[
			'code' => 'CSE2MAX',
			'name'  => 'Mobile Application Development',
        ]
		[
			'code' => 'CSE2OSX',
			'name'  => 'Operating Systems',
        ]
		[
			'code' => 'CSE2ADX',
			'name'  => 'Application Development in the Cloud',
        ]
		[
			'code' => 'CSE2CPX',
			'name'  => 'Managing Projects in the Cloud',
        ]
		[
			'code' => 'CSE2MLX',
			'name'  => 'Machine Learning',
        ]
		[
			'code' => 'CSE2SAX',
			'name'  => 'Operating Systems Administration',
        ]
		[
			'code' => 'CSE2ANX',
			'name'  => 'Advanced Computer Networks',
        ]
		[
			'code' => 'CSE2WDX',
			'name'  => 'Web Development',
        ]
		[
			'code' => 'CSE3BGX',
			'name'  => 'Big Data Management on the Cloud (Elective)',
        ]
		[
			'code' => 'CSE3CIX',
			'name'  => 'Computational Intelligence for Data Analysis (Elective)',
        ]
		[
			'code' => 'CSE3CSX',
			'name'  => 'Cybersecurity Fundamentals (Elective)',
        ]
		[
			'code' => 'CSE3NWX',
			'name'  => 'Networks, Systems and Web Security (Elective)',
        ]
		[
			'code' => 'CSE3OTX',
			'name'  => 'Internet of Things (Elective)',
        ]
		[
			'code' => 'CSE3WSX',
			'name'  => 'Wireless Network Engineering (Elective)',
        ]
		[
			'code' => 'CSE3PAX',
			'name'  => 'Industry Project 3A',
        ]
		[
			'code' => 'CSE3PBX',
			'name'  => 'Industry Project 3B',
        ]
		[
			'code' => 'CSE3PEX',
			'name'  => 'Profesional Environment',
        ]
		[
			'code' => 'CSE3ACX',
			'name'  => 'Architecting on the Cloud',
        ]
		[
			'code' => 'CSE3SOX',
			'name'  => 'System Operations on the Cloud',
        ]
		[
			'code' => 'CSE3BDX',
			'name'  => 'Big Data on the Cloud',
        ]
		[
			'code' => 'CSE3PCX',
			'name'  => 'Private Cloud Solutions',
        ]
		[
			'code' => 'CSE3CAX',
			'name'  => 'Industry Project for Cloud Technology 3A',
        ]
		[
			'code' => 'CSE3CBX',
			'name'  => 'Industry Project for Cloud Technology 3B',
        ]
		);
    }
}