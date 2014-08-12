<?php

class StreetsTableSeeder extends Seeder {
    
    public function run() {
        
        DB::table('streets')->delete();
        
        Street::create([
            'title' => 'Дзержинского'
        ]);
        
        Street::create([
            'title' => 'Москатова'
        ]);
        
        Street::create([
            'title' => 'Ленина'
        ]);
        
        Street::create([
            'title' => 'Большая Садовая'
        ]);
        
        Street::create([
            'title' => 'Ефимова'
        ]);
    }
}