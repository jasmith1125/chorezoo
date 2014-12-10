<?php

class Chore extends Eloquent {

 # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');


    /**
    * Chores belong to many Tags
    */
    public function tags() {

        return $this->belongsToMany('Tag');

    }

    /**
    * Chores belong to User
    */
    public function user() {

        return $this->belongsTo('User');

    }

}
