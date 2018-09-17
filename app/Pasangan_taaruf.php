<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasangan_taaruf extends Model
{
    protected $table = 'pasangan_taaruf';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_pasangan1',
        'id_pasangan2',
        'status_hold'
    ];
}
