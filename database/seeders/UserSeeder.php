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
			'firstname' => 'Acacia',
			'password' => Hash::make('password'),
            'email' => Str::random(10)'@gmail.com',
			'maxLoad' => '1.0',
        ]
		[
			'firstname' => 'Beech',
			'password' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
			'maxLoad' => '1.0',
		]
		[
			'firstname' => 'Cypress',
			'password' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
			'maxLoad' => '1.0',
		]
		[
			'firstname' => 'Douglas',
			'password' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
			'maxLoad' => '0.8',
		]
		[
			'firstname' => 'Eucalypt',
			'password' => Hash::make('password'),
            'email' => Str::random(10).'@gmail.com',
			'maxLoad' => '0.4',
		]
		[
			'firstname' => 'Flame',
			'password' => Hash::make('password'),
            'email' => random(10).'@gmail.com',
			'maxLoad' => '1.0',
		]
		[
			'firstname' => 'Guava',
			'password' => Hash::make('password'),
            'email' => random(10).'@gmail.com',
			'maxLoad' => '0.6',
			
		]
		[
			'firstname' => 'Hickory',
			'password' => Hash::make('password'),
            'email' => random(10).'@gmail.com',
			'maxLoad' => '0.8',
			
		]
		[
			'firstname' => 'Ironbark',
			'password' => Hash::make('password'),
            'email' => random(10).'@gmail.com',
			'maxLoad' => '1.0',
			
		]
		[
			'firstname' => 'Jacaranda',
			'password' => Hash::make('password'),
            'email' => random(10).'@gmail.com',
			'maxLoad' => '0.4',
			
		]
		[
			'firstname' => 'Karri',
			'password' => Hash::make('password'),
            'email' => random(10).'@gmail.com',
			'maxLoad' => '1.0',
			
		]
		[
			'firstname' => 'Laurel',
			'password' => Hash::make('password'),
            'email' => random(10).'@gmail.com',
			'maxLoad' => '1.0',
			
		]
		[
			'firstname' => 'Mapel',
			'password' => Hash::make('password'),
            'email' => random(10).'@gmail.com',
			'maxLoad' => '1.0',
			
		]
		);
    }
}