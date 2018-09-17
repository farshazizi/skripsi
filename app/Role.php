<?php

namespace App;

// use Laratrust\LaratrustRole;
use Illuminate\Database\Eloquent\Model;

// class Role extends LaratrustRole
// {
	
// }

class Role extends Model
{
	public function users()
	{
	  return $this->belongsToMany(User::class);
	}
}
