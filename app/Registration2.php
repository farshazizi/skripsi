<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration2 extends Model
{
    protected $table = 'registration2s';

	public $primaryKey = 'id';

	public $foreignKey = 'id_user';

    public $fillable = [
    	'id_user',
    	'tinggi_badan',
    	'berat_badan',
    	'gol_darah',
        'merokok',
    	'riwayat_kesehatan',
    ];

    public function user2(){
        return $this->belongsTo('App\Registration1', 'foreign_key');
    }
}
