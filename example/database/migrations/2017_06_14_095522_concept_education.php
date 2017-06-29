<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConceptEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('concept_education', function (Blueprint $table) {
		    $table->integer('concept_id')->unsigned();
		    $table->foreign('concept_id')->references('id')->on('concepts')->onDelete('cascade');
		    $table->integer('education_id')->unsigned();
		    $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
		    $table->primary(['concept_id', 'education_id']);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('concept_education');
    }
}
