<?php

namespace App;

/**
 * App\Education
 *
 * @property int $id
 * @property string $name
 * @property string|null $info
 * @property string $created_at
 * @property string $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Education whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Education extends Model
{
	protected $table = 'educations';
	public $timestamps = false;

	public function categories()
	{
		return $this->belongsToMany(Category::class);
	}
}
