<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanKeluarga extends Model
{
    use HasFactory;

    protected $table = 'karyawan_keluarga';

    protected $fillable = [
        'karyawan_id',
        'nama',
        'hubungan',
    ];

    public function karyawan()
    {
        return $this->belongsTo('\App\Models\Karyawan', 'karyawan_id');
    }
}
