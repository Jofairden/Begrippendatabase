<?php

namespace App;

use App\Model;

class Permission extends Model
{
    //
	protected $fillable = [ 'name',
							'description' ];
	public $timestamps = false;
}
