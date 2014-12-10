<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoreTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() 
	{
		Schema::create('chore_tag', function($table) {

			# AI, PK
			# none needed

			# General data...
			$table->integer('chore_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			
			# Define foreign keys...
			$table->foreign('chore_id')->references('id')->on('chores');
			$table->foreign('tag_id')->references('id')->on('tags');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chore_tag');
	}

}
