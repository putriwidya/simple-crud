<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'T_PROVINSI';
    protected $fillable = [
        'name',
        'kode',
        'status',
    ];

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class);
    }
}
