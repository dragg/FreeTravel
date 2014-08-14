<?php

class HabitationController extends BaseController {
    
    
    public function postSaveHabitation() {
        
        var_dump(Input::get('id')); die();
        
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
    
    public function postDeleteHabitation() {
        $response = FALSE;
        
        $id = Input::get('id');
        $habitation = DB::table('habitations')->where('id', $id)->first();
        
        if (isset($habitation)) {
            DB::table('habitations')->where('id', $id)->update(['deleted' => 1]);
            $response = TRUE;
        }
        
        return Response::json($response);
    }
    
    public function getCreateHabitation() {
        
        
        
        $amenities = DB::table('amenities')->get();
        $restrictions = DB::table('restrictions')->get();
        $cities = DB::table('cities')->get();
        
        $response = ['amenities' => $amenities, 'restrictions' => $restrictions,
                'cities' => $cities];
        
        $id = Input::get('id');
        
        if(isset($id)) {
            $habitation = DB::table('habitations')
                ->where('id', $id)
                ->first();
            
            $response['habitation'] = $habitation;
            
            //var_dump($response);die();
        }
        
        return View::make('profile.create_habitation', $response);
    }
}
