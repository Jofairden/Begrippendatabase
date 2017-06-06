<?php

namespace App;

class Term extends Model
{
	public function scopeFsthalf($query)
	{
		return $query->where('id', '<', 25);
	}

	public function scopeLsthalf($query)
	{
		return $query->where('id', '>', 25);
	}
}
