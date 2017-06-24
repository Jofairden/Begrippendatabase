<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Suggestion
 *
 * @property int $id
 * @property string $name
 * @property string $info
 * @property string $categories
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suggestion whereCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suggestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suggestion whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suggestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suggestion whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suggestion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Suggestion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Suggestion extends Model
{
    protected $table = 'suggested';
    public $timestamps = false;
}
