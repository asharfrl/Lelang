<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    protected $table = 'tb_lelang';

    protected $fillable = ['user_id', 'barang_id', 'harga_akhir', 'status'];

    protected $dates = [
        'created_at',
        // Tambahkan kolom tanggal lainnya di sini jika diperlukan
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
