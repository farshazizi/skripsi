<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_pencari',
        'id_calon',
    	'nilai'
    ];
}
