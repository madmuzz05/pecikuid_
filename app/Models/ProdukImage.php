<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    protected $primaryKey = 'id_image';
    protected $fillable =[
        'foto',
        'produk_id'
    ];
}
