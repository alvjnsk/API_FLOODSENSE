<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_laporan',
        'id_masyarakat',
        'isi_laporan',
        'tgl_laporan',
        'foto',
        'alamat',
        'status',
        'status_bantuan'
    ];
}