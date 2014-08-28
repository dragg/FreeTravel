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
        
        public function requests() {
            return $this->hasMany('HabitationRequest');
        }
        
        public function city() {
            return $this->belongsTo('City');
        }

        public function amenities() {
            return $this->belongsToMany('Amenity', 'habitation_amenities');
        }
        
        public function restrictions() {
            return $this->belongsToMany('Restriction', 'habitation_restrictions');
        }
        
        public function scopeCurrentUser($query) {
            return $query->where('user_id', Auth::user()->id);
        }
        
        public function scopeActive($query) {
            return $query->where('deleted', 0)->orderBy('id', 'desc');
        }
        
        public function scopeCity($query, $city_id) {
            return $query->where('city_id', $city_id);
        }
        
        public function scopePlaces($query, $count) {
            return $query->where('places', '>=', $count);
        }
        
        public function getPathPic() {
            return (file_exists('public/habitationsPic/' . $this->id . '.jpg') ? '/habitationsPic/' . $this->id : '/habitationsPic/none').'.jpg';
        }
    
}