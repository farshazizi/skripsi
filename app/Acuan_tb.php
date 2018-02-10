<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuan_tb extends Model
{
    protected $table = 'acuan_tb';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_user',
        'bb_tb',
    	'ba_tb',
    	'keterangan',
    ];
}
