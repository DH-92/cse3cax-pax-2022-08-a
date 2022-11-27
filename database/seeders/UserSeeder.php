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
    DB::table(DBs')->insert([
			'firstName' => 'Acacia',
			'maxLoad' => '1.0',
            'email' => Str::random(10)'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Beech',
			'maxLoad' => '1.0',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);
		
	DB::table(DBs')->insert([
			'firstName' => 'Cypress',
			'maxLoad' => '1.0',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Douglas',
			'maxLoad' => '0.8',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Eucalypt',
			'maxLoad' => '0.4',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);
		
	DB::table(DBs')->insert([
			'firstName' => 'Flame',
			'maxLoad' => '1.0',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);
		
	DB::table(DBs')->insert([
			'firstName' => 'Guava',
			'maxLoad' => '0.6',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Hickory',
			'maxLoad' => '0.8',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Ironbark',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Jacaranda',
			'maxLoad' => '0.4',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Karri',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Laurel',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

	DB::table(DBs')->insert([
			'firstName' => 'Mapel',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);
    }
}
