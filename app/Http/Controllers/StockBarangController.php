<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockBarangController extends Controller
{
    public function index()
    {
        $transactions = DB::table('barang_masuks')
            ->select('kode_barang', 'nama_barang', 'stok as jumlah', DB::raw("'masuk' as tipe_transaksi"), 'tanggal', 'keterangan', 'foto')
            ->unionAll(DB::table('barang_keluars')->join('barang_masuks', 'barang_keluars.barang_masuk_id', '=', 'barang_masuks.id')->select('barang_masuks.kode_barang', 'barang_masuks.nama_barang', DB::raw('CAST(barang_keluars.jumlah AS SIGNED) * -1 as jumlah'), DB::raw("'keluar' as tipe_transaksi"), 'barang_keluars.tanggal', 'barang_keluars.keterangan', 'barang_masuks.foto'))
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('pages.stok-barang.index', compact('transactions'));
    }
}
