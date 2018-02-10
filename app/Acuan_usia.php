<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuan_usia extends Model
{
    protected $table = 'acuan_usia';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_user',
        'bb_usia',
    	'ba_usia',
    	'keterangan',
    ];
}
