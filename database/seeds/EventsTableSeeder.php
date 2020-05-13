<?php

use App\Sport;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $usersId = User::all()->pluck('id')->toArray();
        $sportsId = Sport::all()->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++){
            Event::create([
                'creator_id' => $faker->randomElement($usersId),
                'sport_id' => $faker->randomElement($sportsId),
                'title' => $faker->title,
                'city' => $faker->city,
                'address' => $faker->address,
                'datetime' => $faker->dateTime,
                'max_participants' => rand(1,50),
                'img' => 'img/test',
            ]);
        }
    }
}
