<?php

class  AmenitiesTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('amenities')->delete();
        
        Amenity::create([
            'name' => 'Интернет',       
        ]);
        
        Amenity::create([
            'name' => 'Wi-Fi',     
        ]);
        
        Amenity::create([
            'name' => 'Кабельное ТВ',       
        ]);
        
        Amenity::create([
            'name' => 'Стиральная машина',     
        ]);
        
        Amenity::create([
            'name' => 'Утюг',       
        ]);
    }
    
}