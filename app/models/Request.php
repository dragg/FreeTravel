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
class Request extends Eloquent {
    
    protected $table = 'requests';
    
    protected $guarded =  ['id'];
    
    protected $fillable = ['habitation_id', 'user_id', 'count', 'from', 'to', 'accept'];
}
