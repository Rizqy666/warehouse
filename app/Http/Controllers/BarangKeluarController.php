<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::all();
        $barangMasuk = BarangMasuk::all();
        return view('pages.barang-keluar.index', compact('barangKeluar', 'barangMasuk'));
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
            'barang_masuk_id' => 'required|exists:barang_masuks,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $barangKeluar = new BarangKeluar();
        $barangKeluar->barang_masuk_id = $request->input('barang_masuk_id');
        $barangKeluar->jumlah = $request->input('jumlah');
        $barangKeluar->keterangan = $request->input('keterangan');
        $barangKeluar->user_id = auth()->id();

        $barangKeluar->save();
        // log
        $barangMasuk = BarangMasuk::find($request->input('barang_masuk_id'));
        LogHelper::logActivity('Create', 'User menambahkan barang keluar: ' . $barangMasuk->nama_barang);
        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        //
    }
}
