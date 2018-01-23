<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration6 extends Model
{
    protected $table = 'registration6s';

	public $primaryKey = 'id';

	public $foreignKey = 'id_user';

    public $fillable = [
    	'id_user',
    	// 'kelebihan',
        // 'kekurangan',
    	'deskripsi_diri',
    	'visi_pernikahan',
    	// 'misi_pernikahan',
    	'kehidupan_rumah_tangga'
    ];

    public function user6(){
        return $this->belongsTo('App\Registration1', 'foreign_key');
    }
}
