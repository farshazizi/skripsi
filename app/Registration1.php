<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration1 extends Model
{
	protected $table = 'registration1s';

	public $primaryKey = 'id';	

    public $fillable = [
        'id_user',
        'posisi',
    	'nama_lengkap',
    	'tanggal_lahir',
        'usia',
    	'jenis_kelamin',
    	'alamat_email',
    	'handphone',
    	'alamat_tempat_tinggal',
        'pekerjaan',
        'status_pernikahan',
    	'i_jumlahAnak',
    	'penghasilan',
    	'izin_menikah',
    	'alamat_tinggal_saat_ini'
    ];
}
