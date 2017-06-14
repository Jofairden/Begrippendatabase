<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
	public $timestamps = false;

    public function categories()
    {
	    return $this->belongsToMany(Category::class);
    }
}
