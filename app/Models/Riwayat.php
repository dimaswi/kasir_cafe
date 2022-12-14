<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat_pesanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'id_pemesan',
        'nama_pemesan',
        'nama_menu',
        'menu_id',
        'harga',
        'jumlah_menu',
        'uang_dibayar',
        'uang_dikembalikan'
    ];
}
