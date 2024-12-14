<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalIn = DB::table('barang_masuks')->sum('stok');

        $totalOut = DB::table('barang_keluars')->sum('jumlah');

        $totalStock = $totalIn + $totalOut;

        $totalUsers = User::count();

        return view('pages.dashboard', compact('totalStock', 'totalIn', 'totalOut', 'totalUsers'));
    }
}
