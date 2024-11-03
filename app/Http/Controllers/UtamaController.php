<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $totalbarang = Barang::count();
        $totalpinjam = Peminjaman::where('status', 'belum kembali')->count();
        $totalkembali = Peminjaman::where('status', 'sudah kembali')->count();
        $totaluser = User::count();

        $users = User::where('role', 'user')->paginate();
        return view('admin.dashboard.index', compact('users','totalbarang', 'totalpinjam', 'totalkembali', 'totaluser'));
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
