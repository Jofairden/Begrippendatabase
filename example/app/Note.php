<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Note
 *
 * @property int $id
 * @property string $name
 * @property string $info
 * @property int $user_id
 * @property int $concept_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereConceptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Note whereUserId($value)
 * @mixin \Eloquent
 */
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
