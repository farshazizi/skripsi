<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuan_bb extends Model
{
    protected $table = 'acuan_bb';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_user',
        'bb_bb',
    	'ba_ba',
    	'keterangan',
    ];
}
