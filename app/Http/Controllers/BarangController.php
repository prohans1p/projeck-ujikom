<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\view;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::latest()->paginate();
        return view('admin.barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'kode_barang' => 'required|max:50',
        'nama_barang' => 'required|max:60',
        'kategori' => 'required|max:60',
        'merk' => 'required|max:60',
        'jumlah' => 'required|numeric',
      ]);

      Barang::create([
        'kode_barang' => $request->kode_barang,
        'nama_barang' => $request->nama_barang,
        'kategori' => $request->kategori,
        'merk' => $request->merk,
        'jumlah' => $request->jumlah,
      ]);

        return redirect()->route('barang.index')->with(['succes' => 'data berhasil ditambahkan']);
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
        $barangs = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang' => 'required|max:50',
            'nama_barang'=> 'required|max:60',
            'kategori' => 'required|max:60',
            'merk'=> 'required|max:60',
            'jumlah'=> 'required|numeric',
        ]);

        $barangs = Barang::findOrFail($id);

        $barangs->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'merk' => $request->merk,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('barang.index')->with(['succes' => 'data berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangs = Barang::findOrFail($id);
        $barangs->delete();

        return redirect()->route('barang.index')-> with(['succes', 'data berhasil dihapus']);
    }
}
