<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration4 extends Model
{
    protected $table = 'registration4s';

	public $primaryKey = 'id';

	public $foreignKey = 'id_user';

    public $fillable = [
    	'id_user',
    	// 'sd',
    	// 'smp',
        // 'sma',
    	// 'perguruan_tinggi',
        'pendidikan_terakhir',
    	// 'prestasi',
    	// 'organisasi',
    	// 'pengalaman_kerja',
    	'keahlian_khusus',
        'moto',
        'hobi',
        'jamaah_diikuti',
        'ibadah_sunnah',
        'deskripsi_diri',
        'visi_pernikahan',
        'kehidupan_rumah_tangga'
    ];

    public function user4(){
        return $this->belongsTo('App\Registration1', 'foreign_key');
    }
}
