<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['name', 'info', 'concept_id', 'user_id'];

    public static function fromUser($user_id, $concept_id)
    {
    	return Note::where('user_id', '=', $user_id)
		    ->where('concept_id', '=', $concept_id)
		    ->orderBy('updated_at')
	        ->get();
    }
}
