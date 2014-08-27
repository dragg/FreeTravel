<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HabitationAmenitiesTableSeeder
 *
 * @author Николай
 */
class HabitationAmenitiesTableSeeder extends Seeder {
    //put your code here
    public function run() {
        DB::table('habitation_amenities')->truncate();
        
        for($i = 1; $i <= AmenitiesTableSeeder::count(); $i++) {
            $countHabitations = HabitationsTableSeeder::count();
            $countLucky = mt_rand(1, $countHabitations);
            for($j = 1; $j <= $countLucky; $j++) {
                $habitation_id = 0;
                do {
                    $habitation_id = mt_rand(1, $countHabitations);
                    $habitation = HabitationAmenity::where('habitation_id', $habitation_id)->where('amenity_id', $i)->first();
                } while(isset($habitation));
                
                HabitationAmenity::create([
                    'habitation_id' => $habitation_id,
                    'amenity_id' => $i
                ]);
            } 
        }
    }
}
