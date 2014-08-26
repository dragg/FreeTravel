<?php

class CitiesTableSeeder extends Seeder
{
    protected $cities = [
        'Таганрог',
        'Ростов-на-Дону',
        'Ейск',
        'Краснодар',
        'Москва',
    ];

    public function run()
    {
        DB::table('cities')->truncate();
        
        foreach ($this->cities as $city) {
            City::create([
                'name' => $city
            ]);
        }
    }
    
    public function count() {
        return count($this->cities);
    }
}