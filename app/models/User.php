<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        protected $guarded = array('id');
        
        public function habitations() {
            return $this->hasMany('Habitation');
        }
        
        public function requests() {
            return $this->hasMany('HabitationRequest');
        }

        
        public function getFullName() {
            return $this->first_name . " " . $this->last_name;
        }
}
