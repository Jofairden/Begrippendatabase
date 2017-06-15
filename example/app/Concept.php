<?php

namespace App;

class Concept extends Model
{
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
