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

    /**
    * This array will compare an array of given tags with existing tags
    * and figure out which ones need to be added and which ones need to be deleted
    */
    public function updateTags($new = array()) {

        // Go through new tags to see what ones need to be added
        foreach($new as $tag) {
            if(!$this->tags->contains($tag)) {
                $this->tags()->save(Tag::find($tag));
            }
        }

        // Go through existing tags and see what ones need to be deleted
        foreach($this->tags as $tag) {
            if(!in_array($tag->pivot->tag_id,$new)) {
                $this->tags()->detach($tag->id);
            }
        }
    }

    /**
    * Search among chores, users and tags
    * @return Collection
    */
    
    public static function search($query) {

        # If there is a query, search the library with that query
        if($query) {

            # Eager load tags and author
            $chores = Chore::with('tags', 'user')
            ->whereHas('user', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('tags', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->get();

            # Note on what `use` means above:
            # Closures may inherit variables from the parent scope.
            # Any such variables must be passed to the `use` language construct.

        }
        # Otherwise, just fetch all chores
        else {
            # Eager load tags and author
            $chores = Chore::with('tags', 'user')->get();
        }

        return $chores;
    }
}