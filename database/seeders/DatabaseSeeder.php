<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Text;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

     //  User::factory()->create(['name' => 'foo', 'email' => 'foo@gmail.com', 'password' => "foo"]);
              Text::factory()->create([
    'title' => 'Welcome to Local Chess Club',
          'slug'=>"Home",
    'text' => 'Strategic Minds. Local Battles. Global Dreams. Welcome to our local chess club — where community, learning, and competition come together on every square.'
]);
       Text::factory()->create([
    'title' => 'About',
          'slug'=>"About",
    'text' => "Get to know me!We are a passionate community of chess players based in Athens. Whether you are a beginner eager to learn or a seasoned player chasing FIDE norms, our club offers a welcoming space for improvement, friendly competition, and lifelong learning. We organize weekly meetings, training sessions, and tournaments, helping every member grow — move by move. contact us here."
]);
        Text::factory()->create([
    'title' => 'Achievements',
          'slug'=>"Achievements",
    'text' => "🥇 Multiple local and regional tournament victories

👥 Over 100 active members of all skill levels

🧠 Hosted training sessions with FIDE titled players

♟️ Developed young talents who now compete at national level

🌍 Organized open events with international participation

Our progress is measured not just by trophies — but by the growth and camaraderie we foster across the board."
]);
    }
}
