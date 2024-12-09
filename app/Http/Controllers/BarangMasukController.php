<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = BarangMasuk::all();
        return view('pages.barang-masuk.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        $barangMasuk = new BarangMasuk();
        $barangMasuk->kode_barang = 'BRG-' . date('Y') . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $barangMasuk->nama_barang = $request->input('nama_barang');
        $barangMasuk->jumlah = $request->input('jumlah');
        $barangMasuk->tanggal = $request->input('tanggal');
        $barangMasuk->keterangan = $request->input('keterangan');
        $barangMasuk->user_id = auth()->id();

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
            $barangMasuk->foto = $path;
        }

        $barangMasuk->save();
        // Log aktivitas
        LogHelper::logActivity('Create', 'User menambahkan barang masuk: ' . $request->nama_barang);
        return redirect()->route('barang-masuk.index')->with('success', 'Barang masuk berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        //
    }
}
