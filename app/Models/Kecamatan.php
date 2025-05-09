<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'T_KECAMATAN';
    protected $fillable = [
        'name',
        'kode',
        'T_PROVINSI',
        'status',
    ];

    public function kelurahan()
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
