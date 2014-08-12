<?php

class HabitationController extends BaseController {
    
    
    public function postSaveHabitation() {
        
        $user = DB::table('users')->where('email', Auth::user()['email'])->first();
              
        $habitation_id = DB::table('habitations')->insertGetId(['user_id' => $user->id,
            'title' => Input::get('name'), 'address' => Input::get('address'),
            'places' => Input::get('sleeper'), 'city_id' => Input::get('city'),
            'description' => Input::get('description')]);
                
        foreach (Input::get('amentities') as $amenity) {
            DB::table('habitation_amenities')->insert([
                'habitation_id' => $habitation_id,
                'amenity_id' => $amenity]);
        }
        
        
        foreach (Input::get('restrictions') as $restriction) {
            DB::table('habitation_restrictions')->insert([
                'habitation_id' => $habitation_id,
                'restriction_id' => $restriction]);
        }
        
        return Redirect::action('ProfileController@getMyHabitation');
    }
}
