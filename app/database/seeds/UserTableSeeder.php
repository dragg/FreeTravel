<?php

class  UserTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->delete();
        
        User::create([
            'email' => 'user1@inotravel.dev',
            'first_name' => 'user1',
            'last_name' => 'user1',
            'telephone' => '8 908 519 73 23',
            'password' => Hash::make('123'),
            'habitation_owner' => 1,            
        ]);
        
        User::create([
            'email' => 'user2@inotravel.dev',
            'first_name' => 'user2',
            'last_name' => 'user2',
            'telephone' => '8 908 519 73 23',
            'password' => Hash::make('123'),
            'habitation_owner' => 0,            
        ]);
        
        User::create([
            'email' => 'u@u.com',
            'first_name' => 'u',
            'last_name' => 'u',
            'telephone' => '8 908 519 73 23',
            'password' => Hash::make('u'),
            'habitation_owner' => 0,            
        ]);
    }
    
}