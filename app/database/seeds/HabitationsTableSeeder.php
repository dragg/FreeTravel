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
    
    public function run()
    {
        DB::table('habitations')->delete();
        
        Habitation::create([
            'user_id' => 1,
            'title' => 'Room 1R4',
            'address' => 'Мечникова 34',
            'city_id' => 2,
            'description' => 'Very good room!',
            'places' => 4
        ]);
        
        Habitation::create([
            'user_id' => 1,
            'title' => 'Room 1R5',
            'address' => 'Мечникова 34',
            'city_id' => 2,
            'description' => 'Very good room!',
            'places' => 5
        ]);
        
        Habitation::create([
            'user_id' => 2,
            'title' => 'Room 2R1',
            'address' => 'Энегльса 77',
            'city_id' => 1,
            'description' => 'Very good room!',
            'places' => 1
        ]);
        
        Habitation::create([
            'user_id' => 3,
            'title' => 'Комната 3R2',
            'address' => 'Некрасовский 4',
            'city_id' => 1,
            'description' => 'Very good room!',
            'places' => 2
        ]);
        
        Habitation::create([
            'user_id' => 3,
            'title' => 'Room 3R6',
            'address' => 'Чехова 15',
            'city_id' => 1,
            'description' => 'Very good room!',
            'places' => 6
        ]);
    }
}
