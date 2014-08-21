<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author Николай
 */
class HabitationRequest extends Eloquent {
    
    protected $table = 'requests';
    
    protected $guarded =  ['id'];
    
    protected $fillable = ['habitation_id', 'user_id', 'count', 'from', 'to', 'accept'];
    
    public function user() {
        return $this->belongsTo('User');
    }
    
    public function habitation() {
        return $this->belongsTo('Habitation');
    }

    public function scopeActive($query) {
        return $query->where('deleted', 0);
    }
    
    public function scopeCurrentUser($query) {
        return $query->where('user_id', Auth::user()->id);
    }
}
