<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bunga extends Model
{
    // Nama tabel 
    protected $table = 'bunga';

    protected $fillable = [
        'kategori',   
        'jenis',      
        'gambar',         
        'harga',      
    ];

    public static function getKategoriList():array{
        return [
            'bunga_satuan' => 'Bunga Satuan',
            'buket_thumbelina' => 'Bunga Thumbelina',
            'buket_makanan' => 'Buket Makanan',
            'flower_box' => 'Flower Box',
        ];
    }
}
