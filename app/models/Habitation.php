<?php

class Habitation extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'habitations';
    
        public function user() {
            return $this->belongsTo('User');
        }
        
        public function habitationRequest() {
            return $this->hasMany('HabitationRequest');
        }
        
        
        public function scopeActive($query) {
            return $query->where('deleted', 0);
        }
        
        public function scopeCity($query, $city_id) {
            return $query->where('city_id', $city_id);
        }
        
        public function scopePlaces($query, $count) {
            return $query->where('places', '>=', $count);
        }
    
}