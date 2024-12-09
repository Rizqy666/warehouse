<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $logs = \App\Models\Log::query();

        // Filter berdasarkan query jika ada
        if ($request->has('q')) {
            $logs->where('activity', 'like', '%' . $request->input('q') . '%');
        }

        // Menggunakan pagination untuk mengambil data per halaman
        $data = $logs->paginate($request->input('pageSize', 15));

        // Mengembalikan data ke view (bukan JSON)
        return view('pages.logs.index', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
