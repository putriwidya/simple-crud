<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'T_KELURAHAN';
    protected $fillable = [
        'name',
        'kode',
        'T_KECAMATAN',
        'status',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
