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
    
    public function scopeForCurrentUser($query) {
        return $query->where('habitation_user_id', Auth::user()->id);
    }
    
    public function scopeUnderConsideration($query) {
        return $query->where('accept', 0);
    }
    
    public function scopeForHabitation($query, $habitation_id) {
        return $query->where('habitation_id', $habitation_id);
    }
    
    public function scopeRemove($query) {
        return $query->update('deleted', 1);
    }
    
    public function getDateFrom() {
        return date('d-m-Y', strtotime($this->from));
    }
    
    public function getDateTo() {
        return date('d-m-Y', strtotime($this->to));
    }
    
    public function getPeriod() {
        return $this->getDateFrom() . ' - ' . $this->getDateTo();
    }
}
