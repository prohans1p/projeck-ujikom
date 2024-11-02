<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamen = Peminjaman::latest()->paginate();
        return view('admin.peminjaman.index', compact('peminjamen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        $peminjamen = Peminjaman::findOrFail($id);
        return view('admin.peminjaman.edit', compact('peminjamen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang' => 'required|max:50',
            'jumlah'=> 'required|numeric',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
            'keperluan' => 'required|max:50',
            'status' => 'required|max:50',
        ]);

        $peminjamen = Peminjaman::findOrFail($id);

        $peminjamen->update([
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali'=> $request->tgl_kembali,
            'keperluan' => $request->keperluan,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.peminjaman.index')->with(['succes' => 'berhasil dipinjam']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peminjamen = Peminjaman::findOrFail($id);
        $peminjamen->delete();
        return redirect()->route('admin.peminjaman.index')->with(['succes' => 'data berhasil dihapus']);
    }
}
