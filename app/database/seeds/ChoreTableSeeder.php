<?php

class ChoreTableSeeder extends Seeder {


	public function run() {

		# Clear the tables to a blank slate
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
		DB::statement('TRUNCATE chores');
		DB::statement('TRUNCATE tags');
		DB::statement('TRUNCATE chore_tag');
		DB::statement('TRUNCATE users');




		# Tags (Created using the Model Create shortcut method)
		# Note: Tags model must have `protected $fillable = array('name');` in order for this to work
		$homework         = Tag::create(array('name' => 'homework'));
		$housework       = Tag::create(array('name' => 'housework'));
		$reminder    = Tag::create(array('name' => 'reminder'));
		$high_priority       = Tag::create(array('name' => 'high_priority'));
		$community_service        = Tag::create(array('name' => 'community_service'));
		$fun_stuff         = Tag::create(array('name' => 'fun_stuff'));
		


		# Chores
		$chore1 = new Chore;
		$chore1->description = 'Complete homework assignments';
		$chore1->completed = '';

		# Associate has to be called *before* the book is created (save())
		//$chore1->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore1->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore1->tags()->attach($homework);
		$chore1->tags()->attach($high_priority);
		

		$chore2 = new Chore;
		$chore2->description = 'Feed and water pets';
		$chore2->completed = '';

		# Associate has to be called *before* the book is created (save())
		//$chore2->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore2->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore2->tags()->attach($reminder);
		$chore2->tags()->attach($high_priority);
		$chore2->tags()->attach($fun_stuff);


		$chore3 = new Chore;
		$chore3->description = 'Walk the dog';
		$chore3->completed = '';

		# Associate has to be called *before* the book is created (save())
		//$chore3->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore3->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore3->tags()->attach($reminder);
		$chore3->tags()->attach($high_priority);
		$chore3->tags()->attach($fun_stuff);
		

		$chore4 = new Chore;
		$chore4->description = 'Make my bed';
		$chore4->completed = '';

		# Associate has to be called *before* the book is created (save())
		//$chore4->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore4->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore4->tags()->attach($housework);
	
		$chore5 = new Chore;
		$chore5->description = 'Put away all toys and books';
		$chore5->completed = '';

		# Associate has to be called *before* the book is created (save())
		//$chore5->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore5->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore5->tags()->attach($housework);

		
		# Users
		$user = new User;
		$user->username    = 'Quinn';
		$user->password = Hash::make('quinn123');
		$user->save();

		
		}

	}