<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::all();
        $barangMasuk = BarangMasuk::all();
        return view('pages.barang-keluar.index', compact('barangKeluar', 'barangMasuk'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'barang_masuk_id' => 'required|exists:barang_masuks,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $barangMasukId = $request->input('barang_masuk_id');
        $jumlah = $request->input('jumlah');
        $tanggal = $request->input('tanggal');
        $keterangan = $request->input('keterangan', '');

        $barangMasuk = BarangMasuk::find($barangMasukId);

        if (!$barangMasuk) {
            return redirect()->route('barang.keluar.index')->with('error', 'Barang masuk tidak ditemukan');
        }

        if ($barangMasuk->stok < $jumlah) {
            return redirect()->route('barang.keluar.index')->with('error', 'Stok tidak cukup');
        }

        $barangMasuk->stok -= $jumlah;
        $barangMasuk->save();

        $barangKeluar = BarangKeluar::create([
            'user_id' => auth()->user()->id,
            'barang_masuk_id' => $barangMasukId,
            'jumlah' => $jumlah,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan,
            'is_keluar' => true,
        ]);

        LogHelper::logActivity('Create', 'User menambahkan barang keluar: ' . $barangKeluar->jumlah . ' barang ' . $barangMasuk->nama_barang);

        return redirect()->route('barang.keluar.index')->with('success', 'Barang berhasil dikeluarkan');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_masuk_id' => 'required|exists:barang_masuks,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $barangMasukId = $request->input('barang_masuk_id');
        $jumlah = $request->input('jumlah');
        $tanggal = $request->input('tanggal');
        $keterangan = $request->input('keterangan', '');

        $barangKeluar = BarangKeluar::find($id);

        if (!$barangKeluar) {
            return redirect()->route('barang.keluar.index')->with('error', 'Barang keluar tidak ditemukan');
        }

        $barangMasuk = BarangMasuk::find($barangMasukId);

        if (!$barangMasuk) {
            return redirect()->route('barang.keluar.index')->with('error', 'Barang masuk terkait tidak ditemukan');
        }

        $stokAwal = $barangKeluar->jumlah;
        $stokBaru = $jumlah;

        if ($barangMasuk->stok + $stokAwal - $stokBaru < 0) {
            return redirect()->route('barang.keluar.index')->with('error', 'Stok tidak cukup');
        }

        $barangMasuk->stok = $barangMasuk->stok + $stokAwal - $stokBaru;
        $barangMasuk->save();

        $barangKeluar->update([
            'barang_masuk_id' => $barangMasukId,
            'jumlah' => $jumlah,
            'tanggal' => $tanggal,
            'keterangan' => $keterangan,
        ]);

        LogHelper::logActivity('Update', 'User memperbarui barang keluar: ' . $barangKeluar->jumlah . ' barang ' . $barangMasuk->nama_barang);

        return redirect()->route('barang.keluar.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $barang = BarangKeluar::findOrFail($id);

        $barang->delete();

        LogHelper::logActivity('Delete', 'User menghapus barang keluar: ' . $barang->barangmasuk->nama_barang);

        return redirect()->route('barang.keluar.index')->with('success', 'Barang berhasil dihapus');
    }
    protected function generateKodeBarang($namaBarang)
    {
        $tahun = now()->year;

        $kataBarang = implode('-', array_slice(explode(' ', strtolower($namaBarang)), 0, 3));

        $randomNumber = rand(1000, 9999);

        return 'BRG-' . $kataBarang . '-' . $tahun . $randomNumber;
    }
}
