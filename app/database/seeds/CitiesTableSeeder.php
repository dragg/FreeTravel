<?php

class CitiesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cities')->delete();
        
        City::create([
            'name' => 'Таганрог'
        ]);
        
        City::create([
            'name' => 'Ростов-на-Дону'
        ]);
    }
}