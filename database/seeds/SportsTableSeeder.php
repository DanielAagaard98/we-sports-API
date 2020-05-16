<?php

use App\Sport;
use Illuminate\Database\Seeder;

class SportsTableSeeder extends Seeder
{
    const SPORTS = ['Futbol', 'Basquet', 'Tenis', 'Voley', 'Padel', 'Ciclismo', 'Patinaje', 'Senderismo',
                    'Waterpolo', 'Hockey'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::SPORTS as $sport){
            Sport::create([
                'name' => $sport
            ]);
        }
    }
}
