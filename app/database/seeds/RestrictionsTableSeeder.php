<?php

class RestrictionsTableSeeder extends Seeder 
{
    protected static $restrictions = [
        'Есть животные',
        'Есть комнатные растения',
        'Нельзя курить',
        'Нельзя пить',
    ];
    
    public function run()
    {
        DB::table('restrictions')->truncate();
        
        foreach (self::$restrictions as $restriction) {
            Restriction::create([
                'name' => $restriction
            ]);
        }
    }
    
    public static function count() {
        return count(self::$restrictions);
    }
}
