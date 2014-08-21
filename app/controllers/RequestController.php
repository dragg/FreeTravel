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
            $request->habitation_user_id = Habitation::find(Input::get('id'))->user_id;
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
    
    protected $rulesAccept = [
        'id' => 'required|exists:requests'
    ];
    
    public function postAccept() {
        $response = 'Success';
        $message = '';
        
        $validator = Validator::make(Input::all(), $this->rulesAccept);
        if($validator->fails()) {
            $response = 'Fail';
            $message = 'This request don\'t exist';
        } else {
            $request = HabitationRequest::find(Input::get('id'));
            if($request->habitation->user_id === Auth::user()->id){
                if($request->accept === 0) {
                    $request->accept = 1;
                    $request->save();
                } else {
                    $response = 'Fail';
                    $message = 'You have already made ​​a choice';
                }
            } else {
                $response = 'Fail';
                $message = 'Access denied';
            }
        }
            
        return Response::json([$response, $message]);
    }
    
    public function postRefuse() {
        $response = 'Success';
        $message = '';
        
        $validator = Validator::make(Input::all(), $this->rulesAccept);
        if($validator->fails()) {
            $response = 'Fail';
            $message = 'This request don\'t exist';
        } else {
            $request = HabitationRequest::find(Input::get('id'));
            if($request->habitation->user_id === Auth::user()->id){
                if($request->accept === 0) {
                    $request->accept = -1;
                    $request->save();
                } else {
                    $response = 'Fail';
                    $message = 'You have already made ​​a choice!';
                }
            } else {
                $response = 'Fail';
                $message = 'Access denied';
            }
        }
        
        return Response::json([$response, $message]);
    }
}