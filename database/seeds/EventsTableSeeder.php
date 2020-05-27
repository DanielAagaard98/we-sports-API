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
        $faker = Factory::create('es_ES');
        $usersId = User::all()->pluck('id')->toArray();
        $sportsId = Sport::all()->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++){
            Event::create([
                'creator_id' => $faker->randomElement($usersId),
                'sport_id' => $faker->randomElement($sportsId),
                'title' => $faker->text(30),
                'description' => $faker->realText(),
                'city' => $faker->city,
                'address' => $faker->address,
                'datetime' => $faker->dateTimeBetween('+2 months', '+2 years'),
                'max_participants' => rand(1,50),
            ]);
        }
    }
}
