<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';

    public function jabatan()
    {
        return $this->belongsTo('\App\Models\Jabatan');
    }

    public function detail_karyawan()
    {
        return $this->hasOne('\App\Models\DetailKaryawan', 'karyawan_id');
    }

    public function karyawan_keluarga()
    {
        return $this->hasMany('\App\Models\KaryawanKeluarga', 'karyawan_id');
    }
}
