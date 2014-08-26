<?php

class RestrictionsTableSeeder extends Seeder 
{
    protected $restrictions = [
        'Есть животные',
        'Есть комнатные растения',
        'Нельзя курить',
        'Нельзя пить',
    ];
    
    public function run()
    {
        DB::table('restrictions')->truncate();
        
        foreach ($this->restrictions as $restriction) {
            Restriction::create([
                'name' => $restriction
            ]);
        }
    }
    
    public function count() {
        return count($this->restrictions);
    }
}
