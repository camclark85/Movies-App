<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['name' => 'Comedy'],
            ['name' => 'Sci-fi'],
            ['name' => 'Action']
        ];

        DB::table('genres')->truncate();
        DB::table('genres')->insert($genres);
    }
}
