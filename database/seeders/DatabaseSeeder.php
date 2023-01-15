<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SubjectSeeder::class,
            TermSeeder::class,
            QualificationSeeder::class,
            SubjectInstanceSeeder::class,

        ]);
    }
}
