<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_taaruf extends Model
{
    protected $table = 'log_taaruf';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_penolak',
        'id_menolak',
        'alasan'
    ];
}
