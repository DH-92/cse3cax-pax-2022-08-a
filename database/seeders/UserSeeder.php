<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\User;
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
        User::table('users')->insert([
			'firstName' => 'Acacia',
			'maxLoad' => '1.0',
            'email' => Str::random(10)'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Beech',
			'maxLoad' => '1.0',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);
		
		User::table('users')->insert([
			'firstName' => 'Cypress',
			'maxLoad' => '1.0',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Douglas',
			'maxLoad' => '0.8',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Eucalypt',
			'maxLoad' => '0.4',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);
		
		User::table('users')->insert([
			'firstName' => 'Flame',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);
		
		User::table('users')->insert([
			'firstName' => 'Guava',
			'maxLoad' => '0.6',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Hickory',
			'maxLoad' => '0.8',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Ironbark',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Jacaranda',
			'maxLoad' => '0.4',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Karri',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Laurel',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);

		User::table('users')->insert([
			'firstName' => 'Mapel',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]);
    }
}
