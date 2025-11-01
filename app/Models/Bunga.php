<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bunga extends Model
{
    // Nama tabel 
    protected $table = 'bunga';

    protected $fillable = [
        'kategori',   // enum: bucket1 | bucket_makanan
        'jenis',      // contoh: mawar, aster, Paket 200k
        'gambar',     // path relatif: buket/thumbelina.jpg
        'nama',       // opsional (kalau mau nama display)
        'harga',      // simpan tanpa titik (integer)
    ];
}
