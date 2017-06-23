<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryConcept extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // pivot table
    public function up()
    {
		Schema::create('category_concept', function (Blueprint $table) {
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->integer('concept_id')->unsigned();
			$table->foreign('concept_id')->references('id')->on('concepts')->onDelete('cascade');
			$table->primary(['category_id', 'concept_id']);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('category_concept');
    }
}
