<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'nama_peminjam',
        'kode_barang',
        'jumlah',
        'tgl_pinjam',
        'tgl_kembali',
        'keperluan',
        'status',
    ];
}
