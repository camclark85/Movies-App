<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $movies =[
            [
                'title' => 'The Big Lebowski',
                'desc' => 'Jeff "The Dude" Lebowski, mistaken for a millionaire of the same name, seeks restitution for his ruined rug and enlists his bowling buddies to help get it.',
                'image' => 'lebowski.jpg',
                'genre_id' => 1
            ],[
                'title' => 'See No Evil, Hear No Evil',
                'desc' => 'Dave is deaf, and Wally is blind. They witness a murder, but it was Dave who was looking at her, and Wally who was listening.',
                'image' => 'seenoevil.jpg',
                'genre_id' => 1
            ],[
                'title' => 'Alien',
                'desc' => 'After a space merchant vessel receives an unknown transmission as a distress call, one of the crew is attacked by a mysterious life form and they soon realize that its life cycle has merely begun.',
                'image' => 'alien.jpg',
                'genre_id' => 2
            ],[
                'title' => 'Star Trek: First Contact',
                'desc' => 'The Borg travel back in time intent on preventing Earth\'s first contact with an alien species. Captain Picard and his crew pursue them to ensure that Zefram Cochrane makes his maiden flight reaching warp speed.',
                'image' => 'startrek.jpg',
                'genre_id' => 2
            ],[
                'title' => 'Master and Commander: The Far Side of the World',
                'desc' => 'During the Napoleonic Wars, a brash British captain pushes his ship and crew to their limits in pursuit of a formidable French war vessel around South America.',
                'image' => 'masterandcommander.jpg',
                'genre_id' => 3
            ],[
                'title' => 'Mad Max 2: The Road Warrior',
                'desc' => 'In the post-apocalyptic Australian wasteland, a cynical drifter agrees to help a small, gasoline-rich community escape a horde of bandits.',
                'image' => 'madmax.jpg',
                'genre_id' => 3
            ]
        ];

        DB::table('movies')->truncate();
        DB::table('movies')->insert($movies);
    }
}
