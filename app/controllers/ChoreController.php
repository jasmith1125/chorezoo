<?php

class ChoreController extends BaseController {

    public function getChart()
    {
        // Show a listing of chores.
        $chores = Chore::where('user_id','=', Auth::user()->id)->get();
        return View::make('chart', compact('chores'));
    }
   

    // Show the create chore form.
    public function getCreate()
    {
        $tags = Tag::getIdNamePair();
        
        return View::make('create')
        ->with('tags',$tags);
    }

    
   public function postCreate()
{
     $rules = array(
        'description' => 'required|alpha_num|min:2',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()) {
        return Redirect::to('/chart')
        ->with('flash_message', 'Chore creation failed')
        ->withInput()
        ->withErrors($validator);
        }

    // Handle create form submission.
    // instantiate the chore model
    $chore = new Chore();
    $chore->description = Input::get('description');
    $chore->fill(Input::except('tags'));
    $chore->user()->associate(Auth::user());
    $chore->completed = Input::has('completed');
    # Note this save happens before we enter any tags (next step)
    $chore->save();
    
    if(Input::has('tags')) {

            foreach(Input::get('tags') as $tag) {

                # This enters a new row in the chore_tag table
                $chore->tags()->save(Tag::find($tag));
              }  
            }
    return Redirect::action('ChoreController@getChart');
}


    public function getEdit($id)
    {

        // Show the edit chore form.
        
        try {
             # Get all the tags (not just the ones associated with this chore)
            $tags    = Tag::getIdNamePair();
            // Get the chore and all of its associated tags
            $chore = Chore::with('tags')->findOrFail($id);
        }   
        catch(exception $e) {
            return Redirect::to('/chart')->with('flash_message', 'Chore not found');
        }
       
            return View::make('edit')
                ->with('chore', $chore)
                ->with('tags',$tags);
    }


    /**
    * Process the "Edit a chore form"
    * @return Redirect
    */
    public function postEdit() {

     $rules = array(
        'description' => 'required|alpha_num|min:2',
        );
        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()) {
        return Redirect::to('/chart')
        ->with('flash_message', 'Chore edit failed')
        ->withInput()
        ->withErrors($validator);
        } 

          try {
            $chore = Chore::with('tags')->findOrFail(Input::get('id'));
        }
            catch(exception $e) {
                 return Redirect::to('/chart')->with('flash_message', 'Chore not found');
         }
            try {
                # http://laravel.com/docs/4.2/eloquent#mass-assignment
                $chore->fill(Input::except('tags'));
                $chore->completed = Input::has('completed');
                $chore->save();

                # Update tags associated with this book
                if(!isset($_POST['tags'])) $_POST['tags'] = array();
                $chore->updateTags($_POST['tags']);

                return Redirect::action('ChoreController@getChart')->with('flash_message','Your changes have been saved');
            }
            catch(exception $e) {
                return Redirect::to('/chart')->with('flash_message','Error saving changes');
            }
        }



     public function getSearch()
     {
         $tags = Tag::getIdNamePair();
         
         return View::make('search')
         ->with('tags',$tags);
         
     }


        public function postSearch()
    {   
        
        $tags = Input::get('tags');
        $user = Auth::user();
        // Query for chores that belong to logged-in user and have this tag
        try {
            $chores = Chore::where('user_id','=',$user->id)
                ->whereHas('tags', function($q) use ($tags) {
                 $q->whereIn('id', $tags);
        })->get();

        return View::make('search_results', compact('chores'));
    }
       catch(exception $e) {

        return Redirect::to('search')->with('flash_message', 'You have no chores with that tag');
}
}


    public function getDelete(Chore $chore)
    {
        try {
        // Show delete confirmation page.
        return View::make('delete', compact('chore'));
        }
        catch(exception $e) {
            return Redirect::to('/chart')->with('flash_message', 'Chore not found');
        }
    }

    /**
    * Process chore deletion
    *
    * @return Redirect
    */
    public function postDelete()
    {
        try {
        $id = Input::get('chore');
        $chore = Chore::findOrFail($id);
        $chore->user()->associate(Auth::user());
        }
        catch(exception $e) {
        return Redirect::to('/chart')->with('flash_message', 'Chore not found');
    }
        $chore->delete();
        
        return Redirect::action('ChoreController@getChart');
    }
}

