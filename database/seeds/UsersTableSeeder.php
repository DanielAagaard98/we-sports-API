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
        $password = bcrypt('user1234');

        $userPassword = bcrypt('admin1234');
        User::create([
            'nickname' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => $userPassword,
            'name' => 'Administrador',
            'surnames' => 'We Sports',
            'phone' => 666777888,
            'city' => 'Barcelona',
            'address' => 'Pau Claris 121',
        ]);

        for ($i = 0; $i < 10; $i++){
            $nickname = $faker->unique()->name;
            $email = str_replace(' ', '', $nickname);
            User::create([
                'nickname' => $nickname,
                'name' => $nickname,
                'email' => $email.'@gmail.com',
                'password' => $password,
                'surnames' => $faker->name,
                'phone' => 666777666,
                'city' => $faker->city,
                'address' => $faker->address,
            ]);
        }
    }
}
