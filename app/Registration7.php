<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration7 extends Model
{
    protected $table = 'registration7s';

	public $primaryKey = 'id';

	public $foreignKey = 'id_user';

    public $fillable = [
    	'id_user',
        'umur_calon_pasangan',
    	'tb_calon_pasangan',
    	'merokok_calon_pasangan',
    	'penghasilan_calon_pasangan',
        'suku_calon_pasangan',          //kolom baru
        'bb_calon_pasangan',
        // 'suku_domisili_pasangan',       //kolom baru
        'karakter_pasangan',
    ];

    public function user7(){
        return $this->belongsTo('App\Registration1', 'foreign_key');
    }
}
