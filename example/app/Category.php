<?php

namespace App;

class Category extends Model
{
	public $timestamps = false;
	public function scopeByName($query, $order = "ASC")
	{
		return $query->orderBy('name', $order);
	}

	public function scopeByID($query, $order = "ASC")
	{
		return $query->orderBy('id', $order);
	}

	public function concepts()
	{
		return $this->belongsToMany(Concept::class);
	}

	public function educations()
	{
		return $this->belongsToMany(Education::class);
	}

	public static function multiRelationCount(Category $category)
	{
		return \DB::table('category_concept')
			->where('category_id', $category->id)
			->whereIn('concept_id', function($query) use($category)
			{
				$query
					->select('concept_id')
					->from('category_concept')
					->where('category_id', '!=', $category->id);
			})
			->orderBy('concept_id')
			->count();
	}

}
