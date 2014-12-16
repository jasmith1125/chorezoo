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

    public function handleCreate()
    {
        // Handle create form submission.
        // instantiate the chore model
        $chore = new Chore();
        $chore->description = Input::get('description');
        $chore->fill(Input::except('tags'));
        $chore->user()->associate(Auth::user());
        $chore->completed = Input::has('completed');
        
        # Note this save happens before we enter any tags (next step)
        $chore->save();

        foreach(Input::get('tags') as $tag) {

         # This enters a new row in the chore_tag table
         $chore->tags()->save(Tag::find($tag));

        }
        $chore->completed = Input::has('completed');

        return Redirect::action('ChoreController@getChart');

    }

    public function edit(Chore $chore)
    {
        // Show the edit chore form.
        $tags = Tag::getIdNamePair();
        return View::make('edit', compact('chore'))->with('tags',$tags);
    }

    public function handleEdit()
    {
        // Handle edit form submission.
        $chore = Chore::findOrFail(Input::get('id'));
        $chore->description = Input::get('description');
        $chore->completed     = Input::has('completed');
        $chore->save();

        # Note this save happens before we enter any tags (next step)
        $chore->save();

       // foreach(Input::get('tags') as $tag) {

         # This enters a new row in the chore_tag table
         //$chore->tags()->save(Tag::find($tag));

     //}    
        return Redirect::action('ChoreController@getChart');
    }

    /*public function getTag(Chore $chore)
    {
        $tags = Tag::getIdNamePair();
        return View::make('tag', compact('chore'))->with('tags',$tags);
    }

    public function postTag() 
    {
        foreach(Input::get('tags') as $tag) {

         # This enters a new row in the chore_tag table
         $chore->tags()->save(Tag::find($tag));
          return Redirect::action('ChoreController@getChart');
    }
} */

     public function getSearch()
    {
        $tags = Tag::getIdNamePair();
        
        return View::make('search')
        ->with('tags',$tags);
        
    }

    public function postSearch()
    {   
        $tags = Tag::getIdNamePair();
        $chore = Chore::findOrFail(Input::get('id'))->with('tags');
        $tags = $chore->tags()->lists('id');
        $chores = Chore::whereHas('tags', function($q) use ($tags) {
            $q->whereIn('id', $tags);
        })
            ->get();
        return View::make('search_results', compact('chores'));
    }


    public function delete(Chore $chore)
    {
        // Show delete confirmation page.
        return View::make('delete', compact('chore'));
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('chore');
        $chore = Chore::findOrFail($id);
        $chore->user()->associate(Auth::user());
        $chore->delete();

        return Redirect::action('ChoreController@getChart');
    }



}
