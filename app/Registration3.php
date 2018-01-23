<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration3 extends Model
{
    protected $table = 'registration3s';

	public $primaryKey = 'id';

	public $foreignKey = 'id_user';

    public $fillable = [
    	'id_user',
    	'nama_ayah',
    	'suku_ayah',
    	'nama_ibu',
    	'suku_ibu',
    	'alamat_ortu'
    ];

    public function user3(){
        return $this->belongsTo('App\Registration1', 'foreign_key');
    }
}
