<?php

class  AmenitiesTableSeeder extends Seeder
{
    protected static $amenities = [
            'Интернет',
            'Wi-Fi',
            'Кабельное ТВ',
            'Стиральная машина',
            'Утюг',
        ];
    
    public function run()
    {
        DB::table('amenities')->truncate();
        
        foreach (self::$amenities as $amenity) {
            Amenity::create([
                'name' => $amenity,
            ]);
        }
    }
    
    public static function count() {
        return count(self::$amenities);
    }
}