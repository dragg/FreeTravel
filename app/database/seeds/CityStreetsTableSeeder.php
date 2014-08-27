<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CityStreets
 *
 * @author Николай
 */
class CityStreetsTableSeeder extends Seeder {
    
    public function run() {
        
        DB::table('city_streets')->delete();
        
//        $cities = DB::table('cities')->get();
//        $streets = DB::table('streets')->get();
//        
//        for($i = 0; $i < 3; $i++) {
//            CityStreet::create([
//                'city_id' => $cities[0]->id,
//                'street_id' => $streets[$i]->id
//            ]);
//        }
//        
//        
//        for($i = 3; $i < 5; $i++) {
//            CityStreet::create([
//                'city_id' => $cities[1]->id,
//                'street_id' => $streets[$i]->id
//            ]);
//        }
    }
}
