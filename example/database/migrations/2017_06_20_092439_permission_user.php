<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermissionUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('permission_user',function (Blueprint $table) {
		    $table->integer('permission_id')->unsigned();
		    $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		    $table->primary(['permission_id', 'user_id']);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
