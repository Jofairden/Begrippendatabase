<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relconcat extends Model
{
	public function scopeByCategory($query, $order = "ASC")
	{
		return $query->orderBy('cat_id', $order);
	}

	public function scopeByConcept($query, $order = "ASC")
	{
		return $query->orderBy('con_id', $order);
	}

	public function scopeByID($query, $order = "ASC")
	{
		return $query->orderBy('id', $order);
	}
}
