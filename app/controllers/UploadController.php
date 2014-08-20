<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UploadController
 *
 * @author Николай
 */
class UploadController extends BaseController{
    
    public function postUploadAvatar() {
       
        if(Input::hasFile('avatarFile')) {
            
            $user = DB::table('users')->where('email', Auth::user()['email'])
                    ->first();

            $file = Input::file('avatarFile');
            $destinationPath = 'public/avatars/';
            $explode = explode('.', $file->getClientOriginalName());
            $extension = $explode[count($explode) - 1];
            $filename = $user->id . "." . $extension;
            $uploadSuccess = $file->move($destinationPath, $filename);

            if( $uploadSuccess ) {
                return Response::json(['success', $filename]);
            } else {
                return Response::json('error', 400);
            }
        } else {
            return Response::json(['error', 401]);
        }
    }
    
    public function postUploadHabitationFoto() {
        
        if(Input::hasFile('avatarFile')) {
            
            $id = Input::get('id');
//            $user = DB::table('users')->where('email', Auth::user()['email'])
//                    ->first();

            $file = Input::file('fotoFile');
            $destinationPath = 'public/habitationsFoto/';
            $explode = explode('.', $file->getClientOriginalName());
            $extension = $explode[count($explode) - 1];
            $filename = $id . "." . $extension;
            $uploadSuccess = $file->move($destinationPath, $filename);

            if( $uploadSuccess ) {
                return Response::json(['success', $filename]);
            } else {
                return Response::json('error', 400);
            }
        } else {
            return Response::json(['error', 401]);
        }
    }
}
