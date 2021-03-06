<?php

class ChoreTableSeeder extends Seeder {


	public function run() {

		# Clear the tables to a blank slate
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
		DB::statement('TRUNCATE chores');
		DB::statement('TRUNCATE tags');
		DB::statement('TRUNCATE chore_tag');
		DB::statement('TRUNCATE users');

		# Users
		$user = new User;
		$user->username    = 'Quinn';
		$user->password = Hash::make('quinn123');
		$user->save();

		$user = new User;
		$user->username = 'Chloe';
		$user->username = Hash::make('chloe123');
		$user->save();

		# Tags (Created using the Model Create shortcut method)
		# Note: Tags model must have `protected $fillable = array('name');` in order for this to work
		$homework         = Tag::create(array('name' => 'homework'));
		$housework       = Tag::create(array('name' => 'housework'));
		$event    = Tag::create(array('name' => 'event'));
		$top_priority       = Tag::create(array('name' => 'top priority'));
		$community_service        = Tag::create(array('name' => 'community service'));
		$fun_stuff         = Tag::create(array('name' => 'fun stuff'));
		


		# Chores
		$chore1 = new Chore;
		$chore1->description = 'Complete homework assignments';
		$chore1->completed = '';
		$chore1->user_id = 1;

		# Associate has to be called *before* the book is created (save())
		//$chore1->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore1->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore1->tags()->attach($homework);
		$chore1->tags()->attach($top_priority);
		

		$chore2 = new Chore;
		$chore2->description = 'Feed and water pets';
		$chore2->completed = '';
		$chore2->user_id = 1;

		# Associate has to be called *before* the book is created (save())
		//$chore2->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore2->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore2->tags()->attach($top_priority);
		$chore2->tags()->attach($fun_stuff);


		$chore3 = new Chore;
		$chore3->description = 'Walk the dog';
		$chore3->completed = '';
		$chore3->user_id = 1;

		# Associate has to be called *before* the book is created (save())
		//$chore3->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore3->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore3->tags()->attach($fun_stuff);
		

		$chore4 = new Chore;
		$chore4->description = 'Make my bed';
		$chore4->completed = '';
		$chore4->user_id = 1;

		# Associate has to be called *before* the book is created (save())
		//$chore4->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore4->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore4->tags()->attach($housework);
	
		$chore5 = new Chore;
		$chore5->description = 'Put away all toys and books';
		$chore5->completed = '';
		$chore5->user_id = 1;

		# Associate has to be called *before* the book is created (save())
		//$chore5->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore5->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore5->tags()->attach($housework);


		$chore6 = new Chore;
		$chore6->description = 'Swim lesson, Saturday, 10 am';
		$chore6->completed = '';
		$chore6->user_id = 1;

		# Associate has to be called *before* the book is created (save())
		//$chore5->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore6->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore6->tags()->attach($event);
		$chore6->tags()->attach($fun_stuff);


		$chore7 = new Chore;
		$chore7->description = 'Volunteer Club at Humane Society, Saturday, noon';
		$chore7->completed = '';
		$chore7->user_id = 1;

		# Associate has to be called *before* the book is created (save())
		//$chore5->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore7->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore7->tags()->attach($event);
		$chore7->tags()->attach($community_service);
		$chore7->tags()->attach($fun_stuff);

		$chore8 = new Chore;
		$chore8->description = 'Load the dishwasher';
		$chore8->completed = '';
		$chore8->user_id = 1;

		# Associate has to be called *before* the book is created (save())
		//$chore5->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore8->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore8->tags()->attach($housework);
		
		# Chores
		$chore1 = new Chore;
		$chore1->description = 'Study for world history final';
		$chore1->completed = '';
		$chore1->user_id = 2;

		# Associate has to be called *before* the book is created (save())
		//$chore1->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore1->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore1->tags()->attach($homework);
		$chore1->tags()->attach($top_priority);
		

		$chore2 = new Chore;
		$chore2->description = 'Clean my room';
		$chore2->completed = '';
		$chore2->user_id = 2;

		# Associate has to be called *before* the book is created (save())
		//$chore2->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore2->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore2->tags()->attach($housework);


		$chore3 = new Chore;
		$chore3->description = 'Cancer Society 5K Run, Saturday, 10 a.m.';
		$chore3->completed = '';
		$chore3->user_id = 2;

		# Associate has to be called *before* the book is created (save())
		//$chore3->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore3->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore3->tags()->attach($fun_stuff);
		$chore3->tags()->attach($event);
		

		$chore4 = new Chore;
		$chore4->description = 'Violin practice, assignment due Tuesday';
		$chore4->completed = '';
		$chore4->user_id = 2;

		# Associate has to be called *before* the book is created (save())
		//$chore4->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore4->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore4->tags()->attach($homework);
		$chore4->tags()->attach($top_priority);
	
		$chore5 = new Chore;
		$chore5->description = 'volunteer at Heritage Camp';
		$chore5->completed = '';
		$chore5->user_id = 2;

		# Associate has to be called *before* the book is created (save())
		//$chore5->user()->associate($user_id); # Equivalent of $chore1->user_id = $user->id
		$chore5->save();

		# Attach has to be called *after* the book is created (save()),
		# since resulting `book_id` is needed in the book_tag pivot table
		$chore5->tags()->attach($community_service);
		$chore5->tags()->attach($fun_stuff);

		
		}

	}