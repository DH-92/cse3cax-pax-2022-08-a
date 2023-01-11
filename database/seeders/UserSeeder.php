<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
	 
    public function run()
    {
		DB::table('users')->insert([
			'firstName' => 'Acacia',
			'maxLoad' => '1.0',
			'employmentType' => 'Full-time',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'acacia@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Beech',
			'maxLoad' => '1.0',
			'employmentType' => 'Full-time',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'beech@ltu.edu.au',
			'password' => Hash::make('password'),
		]);
		
		DB::table('users')->insert([
			'firstName' => 'Cypress',
			'maxLoad' => '1.0',
			'employmentType' => 'Full-time',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'cypress@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Douglas',
			'maxLoad' => '0.8',
			'employmentType' => 'Full-time',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'douglas@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Eucalypt',
			'maxLoad' => '0.4',
			'employmentType' => 'Casual',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'eucalypt@ltu.edu.au',
			'password' => Hash::make('password'),
		]);
		
		DB::table('users')->insert([
			'firstName' => 'Flame',
			'maxLoad' => '1.0',
			'employmentType' => 'Full-time',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'flame@ltu.edu.au',
			'password' => Hash::make('password'),
		]);
		
			DB::table('users')->insert([
			'firstName' => 'Guava',
			'maxLoad' => '0.6',
			'employmentType' => 'Part-time',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'guava@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Hickory',
			'maxLoad' => '0.8',
			'employmentType' => 'Other',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'hickory@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Ironbark',
			'maxLoad' => '1.0',
			'employmentType' => 'Full-time',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'ironbark@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Jacaranda',
			'maxLoad' => '0.4',
			'employmentType' => 'Temp',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'jacaranda@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Karri',
			'maxLoad' => '1.0',
			'employmentType' => 'Intern',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'karri@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Laurel',
			'maxLoad' => '1.0',
			'employmentType' => 'Casual',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'laurel@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Mapel',
			'maxLoad' => '1.0',
			'employmentType' => 'Part-time',
			'userType' => '0',
			'phone' => '0412 345 678',
            'email' => 'mapel@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Lecturer',
			'maxLoad' => '1.0',
			'employmentType' => 'Full-time',
			'userType' => '0',
            'phone' => 'NULL',
            'email' => 'lecturer@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Manager',
			'maxLoad' => '1.0',
			'employmentType' => 'Full-time',
			'userType' => '1',
            'phone' => 'NULL',
            'email' => 'manager@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

		DB::table('users')->insert([
			'firstName' => 'Admin',
			'maxLoad' => '1.0',
			'employmentType' => 'Full-time',
			'userType' => '2',
            'phone' => 'NULL',
            'email' => 'admin@ltu.edu.au',
			'password' => Hash::make('password'),
		]);
    }
}
