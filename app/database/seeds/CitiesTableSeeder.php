<?php

class CitiesTableSeeder extends Seeder
{
    protected static $cities = [
        'Таганрог',
        'Ростов-на-Дону',
        'Ейск',
        'Краснодар',
        'Москва',
    ];

    public function run()
    {
        DB::table('cities')->truncate();
        
        foreach (self::$cities as $city) {
            City::create([
                'name' => $city
            ]);
        }
    }
    
    public static function count() {
        return count(self::$cities);
    }
}