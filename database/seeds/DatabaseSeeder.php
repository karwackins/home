<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Friend;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create('pl_PL');

        //------------------------------------------------
        $number_of_users = 2;
//        $number_of_posts = 20;
//        $number_of_comments = 5;
        $number_of_events = 5;
        $number_of_tasks = 10;
        $pass = 'pass';
        //------------------------------------------------

                DB::table('users')->insert([
                    'name' => 'Damian Karwacki',
                    'email' => 'home_d@damiankarwacki.pl',
                    'sex' => 'm',
                    'avatar' => $avatar = json_decode(file_get_contents('https://randomuser.me/api/?gender=male'))->results[0]->picture->large,
                    'password' => Hash::make('damian'),
                ]);

                DB::table('users')->insert([
                    'name' => 'Paulina Karwacka',
                    'email' => 'home_p@damiankarwacki.pl',
                    'sex' => 'f',
                    'avatar' => $avatar = json_decode(file_get_contents('https://randomuser.me/api/?gender=female'))->results[0]->picture->large,
                    'password' => Hash::make($pass),
                ]);

            for($event=1; $event<=$number_of_events; $event++)
            {
                DB::table('events')->insert([
                    'content' => $faker->paragraph(2,true),
                    'user_id' => $faker->numberBetween(1, $number_of_users),
                    'data_event' => $faker->dateTimeThisYear(now()),
                    'created_at' => $faker->dateTime(now()),
                    'title'=>'Demo Event-'.$event,
                    'start_date'=>$faker->dateTimeThisYear(now()),
                    'end_date'=>$faker->dateTimeThisYear(now())
                ]);

            }
        }
}
