<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangMasukController extends Controller
{
    public function index()
    {
        $stockBarangMasuk = BarangMasuk::all();
        return view('pages.barang-masuk.index', compact('stockBarangMasuk'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'stok' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'nullable|numeric|min:0',
        ]);

        $kodeBarang = $this->generateKodeBarang($request->nama_barang);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('barang_foto', 'public');
            LogHelper::logInfo('Foto berhasil diupload: ' . $fotoPath);
        } else {
            $fotoPath = null;
            LogHelper::logWarning('Tidak ada foto yang diupload');
        }

        $barangMasuk = BarangMasuk::create([
            'user_id' => auth()->user()->id,
            'kode_barang' => $kodeBarang,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'foto' => basename($fotoPath),
            'harga' => $request->harga,
            'is_masuk' => true,
        ]);
        LogHelper::logActivity('Create', 'User menambahkan barang masuk: ' . $barangMasuk->nama_barang);

        return redirect()->route('barang.masuk.index')->with('success', 'Barang masuk berhasil ditambahkan');
    }
    public function update(Request $request, $id)
    {
        $barang = BarangMasuk::findOrFail($id);

        $oldValues = $barang->getAttributes();

        $request->validate([
            'nama_barang' => 'required|string',
            'stok' => 'required|integer|min:1',
            'harga' => 'nullable|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ]);

        if ($request->hasFile('foto')) {
            if ($barang->foto) {
                Storage::disk('public')->delete('barang_foto/' . $barang->foto);
            }

            $fotoPath = $request->file('foto')->store('barang_foto', 'public');
            $barang->update(['foto' => basename($fotoPath)]);
        }
        $changes = [];
        foreach (['nama_barang', 'stok', 'harga', 'keterangan'] as $key) {
            if ($oldValues[$key] != $request->$key) {
                $changes[] = ucfirst(str_replace('_', ' ', $key)) . ' berubah dari "' . $oldValues[$key] . '" menjadi "' . $request->$key . '"';
            }
        }
        if (count($changes) > 0) {
            LogHelper::logActivity('Update', 'User mengubah barang masuk: ' . $barang->nama_barang . '. Perubahan: ' . implode(', ', $changes));
        }
        return redirect()->route('barang.masuk.index')->with('success', 'Barang berhasil diperbarui');
    }
    public function destroy($id)
    {
        $barang = BarangMasuk::findOrFail($id);

        if ($barang->foto) {
            $fotoPath = public_path('storage/barang_foto/' . $barang->foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        $barang->delete();

        LogHelper::logActivity('Delete', 'User menghapus barang masuk: ' . $barang->nama_barang);

        return redirect()->route('barang.masuk.index')->with('success', 'Barang berhasil dihapus');
    }
    protected function generateKodeBarang($namaBarang)
    {
        $tahun = now()->year;

        $kataBarang = implode('-', array_slice(explode(' ', strtolower($namaBarang)), 0, 3));

        $randomNumber = rand(1000, 9999);

        return 'BRG-' . $kataBarang . '-' . $tahun . $randomNumber;
    }
}
