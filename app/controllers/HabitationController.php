<?php

class HabitationController extends BaseController {
    
    public function __construct() {
        //$this->beforeFilter('auth');
    }
    
    private function getHabitation($habitation_id) {
        $habitation = DB::table('habitations')
                ->where('id', $habitation_id)
                ->first();
        
        $selectAmenities = DB::table('habitation_amenities')
                    ->where('habitation_id', $habitation_id)
                    ->get();
            
        $selectRestrictions = DB::table('habitation_restrictions')
                ->where('habitation_id', $habitation_id)
                ->get();
        
        $response['habitation'] = $habitation;
        $response['sAm'] = $selectAmenities;
        $response['sRe'] = $selectRestrictions;
        
        return $response;
    }

    private static function saveHabitationPic($str, $id) {
        if(file_exists('public/habitationsPic/' . $str . '.jpg')) {
            rename('public/habitationsPic/' . $str . '.jpg', 'public/habitationsPic/' . $id . '.jpg');
        }
    }
    
    public function postSaveHabitation() {
        
        $habitation_id = Input::get('id');
        $habitation_id = intval($habitation_id);
        
        if(isset($habitation_id) && $habitation_id != '') {
            DB::table('habitations')
                    ->where('id', $habitation_id)
                    ->update(['title' => Input::get('name'),
                              'address' => Input::get('address'),
                              'places' => Input::get('sleeper'),
                              'city_id' => Input::get('city'),
                              'description' => Input::get('description')]);
            
                
            DB::table('habitation_amenities')
                ->where('habitation_id', $habitation_id)
                ->delete();;
            
            DB::table('habitation_restrictions')
                ->where('habitation_id', $habitation_id)
                ->delete();
            
        } else {
            
            $user = DB::table('users')->where('email', Auth::user()['email'])->first();
            
            $habitation_id = DB::table('habitations')->insertGetId(['user_id' => $user->id,
                'title' => Input::get('name'), 'address' => Input::get('address'),
                'places' => Input::get('sleeper'), 'city_id' => Input::get('city'),
                'description' => Input::get('description')]);
            
           $this->saveHabitationPic(Input::get('id'), $habitation_id);
        }
       
        $amenities = Input::get('amentities');
        if(isset($amenities)) {
            foreach ($amenities as $amenity) {
                DB::table('habitation_amenities')->insert([
                    'habitation_id' => $habitation_id,
                    'amenity_id' => $amenity]);
            }
        }
        
        $restrictions = Input::get('restrictions');
        if(isset($restrictions)) {
            foreach ($restrictions as $restriction) {
                DB::table('habitation_restrictions')->insert([
                    'habitation_id' => $habitation_id,
                    'restriction_id' => $restriction]);
            }
        }
        
        return Redirect::action('ProfileController@getMyHabitation');
    }
    
    public function postDeleteHabitationPic() {
        $response = ['Success', '', 'none.jpg'];
        if (Habitation::find(Input::get('id'))->user_id === Auth::user()->id) {
            $path = public_path() . '/habitationsPic/' . Input::get('id') . '.jpg';
            if(file_exists($path)) {
                unlink($path);
            } else {
                $response[0] = 'Fail';
                $response[1] = 'File was deleted!';
            }
        } else {
            $response[0] = 'Fail';
            $response[1] = 'Access denied';
        }
        
        
        return Response::json($response);
    }
    
    public function postDeleteHabitation() {
        $response = FALSE;
        
        $id = Input::get('id');
        $habitation = DB::table('habitations')->where('id', $id)->first();
        
        if (isset($habitation)) {
            DB::table('habitations')->where('id', $id)->update(['deleted' => 1]);
            
            $requests = HabitationRequest::forHabitation($id)->get();
            
            foreach ($requests as $request) {
                $request->deleted = 1;
                $request->save();
            }
            
            $response = TRUE;
        }
        
        return Response::json($response);
    }
    
    public function getCreateHabitation() {
        
        $id = Input::get('id');
        $response = [];
        if(isset($id)) {
            
            if (Habitation::find($id)->user->id === Auth::user()->id) {
                $response['habitation'] = Habitation::find($id);
            } else {
                //access denied
                return Redirect::action('ProfileController@getMyHabitation');
            }
            
        } else {
            $response['habitation'] = new Habitation;
        }
        
        $response['amenities'] = DB::table('amenities')->get();
        $response['restrictions'] = DB::table('restrictions')->get();
        $response['cities'] = DB::table('cities')->get();
        
        return View::make('habitation.create_habitation', $response);
    }
    
    public function getShowHabitation($habitation_id, $dateFrom = '', $dateTo = '',  $count = 0) {
        $params = [];
        if (!($dateFrom === '' || $dateTo === '' || $count === 0)) {
            //to valid
            //----
            
            $params['reservation'] = [
                'id' => $habitation_id, 
                'dateFrom' => $dateFrom,
                'dateTo' => $dateTo,
                'count' => $count];
        }
        
        $habitation = Habitation::find($habitation_id);
        
        
        $params['habitation'] = $habitation;
        
        $owner = false;
        if(Auth::check() && Auth::user()->id === $habitation->user_id) {
            $owner = true;
        }
        
        $user = User::find($habitation->user_id);
        
        return View::make('habitation.show_habitation', $params)
           ->with('IsOwner', $owner)
           ->with('owner', $user);
    }
    
    protected $rulesSearch = [
        '_token' => 'required',
        'city' => 'required',
        'dateFrom' => 'required|date_format:d-m-Y|after:today',
        'dateTo' => 'required|date_format:d-m-Y|after:dateFrom|after:today',
        'count' => 'required|digits:1'
    ];


    public function postSearch() {
        $validator = Validator::make(Input::all(), $this->rulesSearch);
        $habs = [];
        $response = [];
        
        if($validator->fails()) {
            $response['error'] = $validator->messages()->first();
        } else {
            $habitations = Habitation::active()
                    ->city(Input::get('city'))
                    ->places(Input::get('count'))
                    ->get();
            
            $response['habitations'] =  $habitations;
        }
        
        $response['searchData'] = Input::all();
        $response['cities'] = City::all();
        
        return View::make('habitation.search', $response);
        
    }
}
