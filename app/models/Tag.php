<?php

class Tag extends Eloquent {

	# Enable fillable on the 'name' column so we can use the Model shortcut Create
	protected $fillable = array('name');

    public function chores() {
        # Tags belong to many Chores
        return $this->belongsToMany('Chore');
    }

	# Model events...
	# http://laravel.com/docs/eloquent#model-events
	public static function boot() {

        parent::boot();

        static::deleting(function($tag) {
            DB::statement('DELETE FROM chore_tag WHERE tag_id = ?', array($tag->id));
        });	
	} 

    /**
    *
    * @return Array
    */
    public static function getIdNamePair() {

        $tags = Array();

        $collection = Tag::all();

        foreach($collection as $tag) {
            $tags[$tag->id] = $tag->name;
        }

        return $tags;
    }
}
