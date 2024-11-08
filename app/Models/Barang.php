<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'kode_barang',
        'nama_barang',
        'kategori',
        'merk',
        'jumlah',
    ];

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'kode_barang');
    }
}
