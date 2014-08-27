<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HabitationsTableSeeder
 *
 * @author Николай
 */
class HabitationsTableSeeder extends Seeder {
    
    protected static $count = 50;


    public function run()
    {
        DB::table('habitations')->truncate();
        
        $faker = Faker\Factory::create('en_US');
        
        foreach (range(1, self::$count) as $value) {
            Habitation::create([
                'user_id' => mt_rand(1, UserTableSeeder::count()),
                'title' => $faker->sentence(2),
                'address' => $faker->address($faker->secondaryAddress),
                'city_id' => mt_rand(1, CitiesTableSeeder::count()),
                'description' => $faker->text,
                'places' => mt_rand(1, 9)
            ]);
        }
    }
    
    public static function count() {
        return self::$count;
    }
}
