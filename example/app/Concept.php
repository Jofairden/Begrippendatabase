<?php

namespace App;

/**
 * App\Concept
 *
 * @property int $id
 * @property string $name
 * @property string|null $info
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Concept byID($order = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Concept byInfo($order = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Concept byName($order = 'ASC')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Concept whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Concept whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Concept whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Concept whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Concept whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

	public function notesFromUser($user_id)
	{
		return Note::fromUser($user_id, $this->id);
	}

	public function notes()
	{
		return Note::where('concept_id', $this->id)->get();
	}
}
