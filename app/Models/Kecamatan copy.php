<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'T_PEGAWAI';
    protected $fillable = [
        'name',
        'kode',
        'T_KELURAHAN',
        'status',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
}
