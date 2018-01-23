<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration5 extends Model
{
    protected $table = 'registration5s';

	public $primaryKey = 'id';

	public $foreignKey = 'id_user';

    public $fillable = [
    	'id_user',
    	'moto',
    	'hobi',
    	// 'website_kunjangan',
    	// 'tokoh_favorit',
    	// 'buku_favorit',
        'jamaah_diikuti',
    	'ibadah_sunnah'
    ];

    public function user5(){
        return $this->belongsTo('App\Registration1', 'foreign_key');
    }
}
