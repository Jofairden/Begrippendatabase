<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }

	public static function hasRole($user, $perm)
	{
		return \DB::table('permission_user')
			->where('user_id', $user)
			->where('permission_id', $perm)
			->count() > 0;
	}

    public static function hasName(int $user, string $perm) { 
        // return \DB::table('permission_user')
        //     ->where('user_id', )
    }
}
