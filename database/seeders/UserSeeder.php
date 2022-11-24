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
        User::table('users')->insert([
			'firstName' => 'Acacia',
			'maxLoad' => '1.0',
            'email' => Str::random(10)'@gmail.com',
			'password' => Hash::make('password'),
        ]
		[
			'firstName' => 'Beech',
			'maxLoad' => '1.0',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Cypress',
			'maxLoad' => '1.0',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Douglas',
			'maxLoad' => '0.8',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Eucalypt',
			'maxLoad' => '0.4',
            'email' => Str::random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Flame',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Guava',
			'maxLoad' => '0.6',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Hickory',
			'maxLoad' => '0.8',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Ironbark',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Jacaranda',
			'maxLoad' => '0.4',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Karri',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Laurel',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		[
			'firstName' => 'Mapel',
			'maxLoad' => '1.0',
            'email' => random(10).'@gmail.com',
			'password' => Hash::make('password'),
		]
		);
    }
}