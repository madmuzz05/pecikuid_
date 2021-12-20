<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Produk extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';


    protected $fillable = [
        'foto',
        'nama_produk',
        'kode_produk',
        'jenis_produk',
        'nomor',
        'tinggi',
        'unit',
        'harga',
        'deskripsi',
        'brand_id',
    ];
}
