<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $password = 'user1234';

        User::create([
            'nickname' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => 'admin1234',
            'name' => 'Administrador'
        ]);

        for ($i = 0; $i < 10; $i++){
            $nickname = $faker->unique()->name;
            $email = str_replace(' ', '', $nickname);
            User::create([
                'nickname' => $nickname,
                'name' => $nickname,
                'email' => $email.'@gmail.com',
                'password' => $password,
                'surname' => $faker->name,
                'phone' => $faker->phoneNumber,
                'city' => $faker->city,
                'address' => $faker->address,
            ]);
        }
    }
}
