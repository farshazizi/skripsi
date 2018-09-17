<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_pasangan extends Model
{
    protected $table = 'data_pasangan';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_pengirim',
        'id_penerima',
        'status_tolak'
    ];
}
