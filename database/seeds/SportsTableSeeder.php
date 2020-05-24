<?php

use App\Sport;
use Illuminate\Database\Seeder;

class SportsTableSeeder extends Seeder
{
    const SPORTS = [
        'fas fa-futbol' => 'Futbol',
        'fas fa-basketball-ball' => 'Basquet',
        'fas fa-table-tennis' => 'Tenis',
        'fas fa-volleyball-ball' => 'Voley',
        'fas fa-football-ball' => 'Rugby',
        'fas fa-bicycle' => 'Ciclismo',
        'fas fa-skating' => 'Patinaje',
        'fas fa-hiking' => 'Senderismo',
        'fas fa-swimmer' => 'Waterpolo',
        'fas fa-hockey-puck' => 'Hockey',
    ];
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
