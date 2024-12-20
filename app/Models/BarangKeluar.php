<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluars';

    protected $fillable = ['user_id', 'barang_masuk_id', 'jumlah', 'tanggal', 'keterangan'];

    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class, 'barang_masuk_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
