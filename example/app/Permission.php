<?php

namespace App;

use App\Model;

/**
 * App\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $info
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends Model
{
    //
	protected $fillable = [ 'name',
							'description' ];
	public $timestamps = false;

	public static function revokedPermissions($user_id)
	{
		return \DB::select(\DB::raw("select * from permissions where id not in ( select permission_id from permission_user where user_id = " .$user_id ." );"));
	}
}
