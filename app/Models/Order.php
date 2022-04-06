<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'id_barang',
        'id_user',
        'jumlah_pesanan',
        'alamat',
        'kode_pos',
        'total_harga',
        'nomor_invoice',
        'status',
    ];
    public function items()
    {
        return $this->belongsTo('App\Models\Item', 'id_barang', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
