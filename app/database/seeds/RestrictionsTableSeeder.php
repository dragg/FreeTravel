<?php

class RestrictionsTableSeeder extends Seeder 
{
    public function run()
    {
        DB::table('restrictions')->delete();
        
        Restriction::create([
           'name' => 'Есть животные'
        ]);
        
        Restriction::create([
           'name' => 'Есть комнатные растения'
        ]);
        
        Restriction::create([
           'name' => 'Нельзя курить'
        ]);
        
        Restriction::create([
           'name' => 'Нельзя пить'
        ]);
    }
}
