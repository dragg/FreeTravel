<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequestsTableSeeder
 *
 * @author Николай
 */
class RequestsTableSeeder extends Seeder {
    //put your code here
    public function run() {
        DB::table('requests')->truncate();
        
        $faker = Faker\Factory::create('en_US');
        $countRequestsForUser = 20;
        $countUser = UserTableSeeder::count();
        $countHabitations = HabitationsTableSeeder::count();
        for($i = 1; $i <= $countUser; $i++) {
            for($j = 0; $j < $countRequestsForUser; $j++) {
                $habitation_id = 0;
                do {
                    $habitation_id = mt_rand(1, $countHabitations);
                } while(Habitation::find($habitation_id)->user_id === $i);
                
                HabitationRequest::create([
                    'habitation_id' => $habitation_id,
                    'habitation_user_id' => Habitation::find($habitation_id)->user_id,
                    'user_id' => $i,
                    'count' => mt_rand(1, Habitation::find($habitation_id)->places),
                    'from' => $faker->dateTimeBetween($startDate = '+1 days', $endDate = '+5 days'),
                    'to' => $faker->dateTimeBetween($startDate = '+6 days', $endDate = '+24 days'),
                    'accept' => mt_rand(-1, 1)
                ]);
                
            }
        }
    }
}
