<?php

class RequestController extends BaseController {
    
    public function postReservation() {
        return Response::json(Input::all());
    }
}