<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration8 extends Model
{
    protected $table = 'registration8s';

	public $primaryKey = 'id';

	public $foreignKey = 'id_user';

    public $fillable = [
    	'id_user',
    	'ktp',
    	'foto_diri',
    	'akte_cerai',
    ];

    public function user8(){
        return $this->belongsTo('App\Registration1', 'foreign_key');
    }
}
