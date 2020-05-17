<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePageTranslationsTable.
 */
class CreatePageTranslationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page_translations', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('content');

            $table->string('image')->nullable();

            $table->string('lang');

            $table->unsignedInteger('language_id');
			$table->foreign('language_id')->references('id')->on('languages');

			$table->unsignedInteger('instance_id');
			$table->foreign('instance_id')->references('id')->on('posts');

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('page_translations');
	}
}
