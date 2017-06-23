<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('category_education', function (Blueprint $table) {
		    $table->integer('category_id')->unsigned();
		    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
		    $table->integer('education_id')->unsigned();
		    $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
		    $table->primary(['category_id', 'education_id']);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('category_education');
    }
}
