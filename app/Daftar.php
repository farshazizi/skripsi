<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    protected $table = 'daftars';

	public $primaryKey = 'id';	

    public $fillable = [
    	'nama_lengkap',
    	'tanggal_lahir',
    	'jenis_kelamin',
    	'alamat_email',
    	'handphone'
    ];
}
