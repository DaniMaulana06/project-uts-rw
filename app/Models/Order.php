<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'nomor_hp',
        'alamat',
        'status',
        'total',
    ];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
