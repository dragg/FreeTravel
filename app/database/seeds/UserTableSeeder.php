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
            'password' => Hash::make('123'),
            'habitation_owner' => 1,            
        ]);
        
        User::create([
            'email' => 'user2@inotravel.dev',
            'first_name' => 'user2',
            'last_name' => 'user2',
            'password' => Hash::make('123'),
            'habitation_owner' => 0,            
        ]);
    }
    
}