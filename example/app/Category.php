<?php

namespace App;

/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string|null $info
 * @property string $created_at
 * @property string $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Concept[] $concepts
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Education[] $educations
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category attr()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category byID($order = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category byName($order = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

	public function scopeAttr($query) {
		return $query->getAttributes();
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
