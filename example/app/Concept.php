<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
	use Searchable;

	public function scopeByName($query, $order = "ASC")
	{
		return $query->orderBy('name', $order);
	}

	public function scopeByInfo($query, $order = "ASC")
	{
		return $query->orderBy('info', $order);
	}

	public function scopeByID($query, $order = "ASC")
	{
		return $query->orderBy('id', $order);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}
}
