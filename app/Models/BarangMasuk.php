<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuks';

    protected $fillable = [
        'user_id',
        'kode_barang',
        'nama_barang',
        'jumlah',
        'tanggal',
        'keterangan',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
