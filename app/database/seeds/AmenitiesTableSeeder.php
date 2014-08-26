<?php

class  AmenitiesTableSeeder extends Seeder
{
    protected $amenities = [
            'Интернет',
            'Wi-Fi',
            'Кабельное ТВ',
            'Стиральная машина',
            'Утюг',
        ];
    
    public function run()
    {
        DB::table('amenities')->truncate();
        
        foreach ($this->amenities as $amenity) {
            Amenity::create([
                'name' => $amenity,
            ]);
        }
    }
    
    public function count() {
        return count($this->amenities);
    }
}