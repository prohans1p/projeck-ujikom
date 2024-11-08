<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role === 'admin'){
            $peminjamen = Peminjaman::latest()->paginate();
        }else{
            $peminjamen = Peminjaman::where('user_id', Auth::id())->latest()->paginate();
        }

        return view('user.pmj.index', compact('peminjamen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::select('kode_barang', 'nama_barang')->get();
        return view('user.pmj.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'user_id' => Auth::id(),
            'user_id' => 'required|exists:users,id|in:' . Auth::id(),
            'nama_peminjam' => 'required|max:60',
            'kode_barang' => 'required|max:60',
            'jumlah' => 'required|numeric|min:1',
            'tgl_pinjam' => 'required|date',
            // 'tgl_kembali' => 'required|date',
             'keperluan' => 'required|max:60',
            // 'status' => 'required|max:60',
        ]);

        $today = Carbon::now();

        $barangs = Barang::where('kode_barang', $request->kode_barang)->first();

        if($barangs && $barangs->jumlah >= $request->jumlah){
        Peminjaman::create([
            'user_id' => $request->user_id,
            'nama_peminjam' => $request->nama_peminjam,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'tgl_pinjam' => Carbon::today(),
            'tgl_kembali' => $request->tgl_kembali,
            // 'tgl_kembali' => Carbon::today(),
            'keperluan' => $request->keperluan,
            // 'status' => $request->status,
        ]);

        $barangs->jumlah -= $request->jumlah;
        $barangs->save();

        return redirect()->route('user.pmj.index')->with(['succes' => 'data barnag berhasil ditambah']);
        }else{
            return redirect()->back()->withErrors(['kode_barang' => 'barang tidak ditemukan']);
        }
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
