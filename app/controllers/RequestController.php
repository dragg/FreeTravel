<?php

class RequestController extends BaseController {
    
    protected $rulesRequest = [
        'id' => 'required|exists:habitations',
        'dateFrom' => 'required|date_format:d-m-Y|after:today',
        'dateTo' => 'required|date_format:d-m-Y|after:dateFrom|after:today',
        'count' => 'required|digits:1'
    ];
    
    public function postReservation() {
        $validator = Validator::make(Input::all(), $this->rulesRequest);
        
        
        if ($validator->fails()) {
            var_dump($validator->messages()->first()); die();
        } else {
            $request = new HabitationRequest;
            
            $request->habitation_id = (int)(Input::get('id'));
            $request->user_id = Auth::user()->id;
            $request->count = (int)Input::get('count');
            $request->from = date('Y-m-d', strtotime(Input::get('dateFrom')));
            $request->to = date('Y-m-d', strtotime(Input::get('dateTo')));
            
            $request->save();            
        }
        
        
        return Response::json(Input::all());
    }
    
    public function getMyRequests() {
        $requests = HabitationRequest::active()->currentUser()->get();
        return View::make('request.my_requests', ['requests' => $requests]);
    }
}