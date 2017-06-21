<?php

namespace App;

use App\Model;

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
