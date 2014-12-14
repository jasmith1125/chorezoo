<?php

class ChoreController extends BaseController {

    public function getChart()
    {
        // Show a listing of chores.
        $chores = Chore::where('user_id','=', Auth::user()->id)->get();
        return View::make('chart', compact('chores'));
    }
    public function getSearch()
    {
        return View::make('search');
    }

    public function search_results()
    {
        $tags = Tag::getIdNamePair();
        $chores = Chore::with('tags', 'user');
        $chores = Chore::whereHas('tags', function($q) {

            $q->where('name', 'LIKE', "%$query%");
        })
            ->get();
        return View::make('search_results', compact('chores', 'tags'));
        //return Redirect::action('ChoreController@getChart');
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
        //$chore->save();

        # Note this save happens before we enter any tags (next step)
        $chore->save();

        foreach(Input::get('tags') as $tag) {

         # This enters a new row in the chore_tag table
         $chore->tags()->save(Tag::find($tag));

        }

        return Redirect::action('ChoreController@getChart');

    }

    public function edit(Chore $chore)
    {
            $tags = Tag::getIdNamePair();
        // Show the edit chore form.
        return View::make('edit', compact('chore'))->with('tags');
    }

    public function handleEdit(Tag $tag)
    {
        // Handle edit form submission.
        $tags = Tag::getIdNamePair();
        $chore = Chore::findOrFail(Input::get('id'));
        $chore->description = Input::get('description');
        $chore->completed     = Input::has('completed');
        $tags->name           = Input::get('name');
        $chore->save();

        return Redirect::action('ChoreController@getChart')->with('tags');
    }

    public function tag(Chore $chore)
    {
        // Show the edit chore form.
        return Redirect::action('ChoreController@getChart');
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
