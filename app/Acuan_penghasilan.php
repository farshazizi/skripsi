<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuan_penghasilan extends Model
{
    protected $table = 'acuan_penghasilan';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_user',
        'bb_penghasilan',
    	'ba_penghasilan',
    	'keterangan',
    ];
}
