<?php

class StreetsTableSeeder extends Seeder {
    
    protected $streets = [
            'Дзержинского',
            'Москатова',
            'Ленина',
            'Большая Садовая',
            'Ефимова',
            'Грозного'
        ];


    public function run() {
        
        DB::table('streets')->delete();
        
        foreach ($this->streets as $street) {
            Street::create([
                'title' => $street
            ]);
        }
    }
    
    public function count() {
        return count($this->streets);
    }
}