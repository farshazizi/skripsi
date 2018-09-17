<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

	public $primaryKey = 'role_id';	

	public $timestamps = false;

    public $fillable = [
        'user_id',
    ];
}
