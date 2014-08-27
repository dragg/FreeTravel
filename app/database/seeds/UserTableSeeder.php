<?php

class  UserTableSeeder extends Seeder
{
    
    protected static $count = 10;


    public function run()
    {
        DB::table('users')->truncate();
        
        $faker = Faker\Factory::create('en_US');
        
        for($i = 1; $i <= 10; $i++) {
            User::create([
                'email' => 'user' . $i . '@inotravel.dev',
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'telephone' => $faker->phoneNumber,
                'password' => Hash::make('123'),          
            ]);
        }
        
        User::create([
            'email' => 'u@u.com',
            'first_name' => 'u',
            'last_name' => 'u',
            'telephone' => '8 908 519 73 23',
            'password' => Hash::make('uuuuuu'),      
        ]);
    }
    
    public static function count() {
        return self::$count + 1;
    }
    
}