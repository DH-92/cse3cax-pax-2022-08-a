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
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Beech',
			'maxLoad' => '1.0',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);
		
			DB::table('users')->insert([
			'firstName' => 'Cypress',
			'maxLoad' => '1.0',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Douglas',
			'maxLoad' => '0.8',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Eucalypt',
			'maxLoad' => '0.4',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);
		
			DB::table('users')->insert([
			'firstName' => 'Flame',
			'maxLoad' => '1.0',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);
		
			DB::table('users')->insert([
			'firstName' => 'Guava',
			'maxLoad' => '0.6',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Hickory',
			'maxLoad' => '0.8',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Ironbark',
			'maxLoad' => '1.0',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Jacaranda',
			'maxLoad' => '0.4',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Karri',
			'maxLoad' => '1.0',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Laurel',
			'maxLoad' => '1.0',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);

			DB::table('users')->insert([
			'firstName' => 'Mapel',
			'maxLoad' => '1.0',
			'employmentType' => 'Lecturer',
			'userType' => '3',
			'phone' => '0412 345 678',
            'email' => Str::random(10).'@ltu.edu.au',
			'password' => Hash::make('password'),
		]);
    }
}