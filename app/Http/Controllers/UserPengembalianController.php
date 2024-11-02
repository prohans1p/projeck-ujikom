<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamen = Peminjaman::latest()->paginate();
        $barangs = Barang::latest()->paginate();
        return view('user.pmb.index', compact('peminjamen', 'barangs'));
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
        $peminjamen = Peminjaman::findOrFail($id);
        return view('user.pmb.edit', compact('peminjamen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'nama_peminjam'=> 'required|max:60',
            'kode_barang'=> 'required|max:60',
            'jumlah'=> 'required|numeric',
            'tgl_pinjam'=>'required|date',
            'tgl_kembali'=>'required|date',
            'keperluan'=>'required|max:60',
            // 'status'=>'required|max:60',
        ]);

        $peminjamen = Peminjaman::findOrFail($id);

       if ($request->hasFile('image')){
            $image = $request->file('image');
            $image->storeAs('storage/public/image', $image->hashName());
            Storage::delete('storage/public/image' . $peminjamen->image);

            $peminjamen->update([
                'image' => $image->hashName(),
                'status' => 'sudah kembali',
            ]);
            $barang = Barang::where('kode_barang', $request->kode_barang)->first();
            if ($barang) {
                $barang->increment('jumlah', $request->jumlah);
            }
       } else {
        $peminjamen->update([
            'tgl_kembali' => $request->tgl_kembali,
        ]);
       }

       $peminjamen->update([
        'nama_peminjam' => $request->nama_peminjam,
        'kode_barang' => $request->kode_barang,
        'jumlah' => $request->jumlah,
        'tgl_pinjam' => $request->tgl_pinjam,
        'tgl_kembali' => $request->tgl_kembali,
        'keperluan' => $request->keperluan,
        // 'status' => $request->status,
       ]);

       return redirect()->route('user.pmb.index')->with(['succes' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
