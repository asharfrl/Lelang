<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'tb_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_barang',
        'harga_awal',
        'deskripsi_barang',
    ];
    protected $dates = ['tgl'];

    public function lelang()
    {
        return $this->hasMany(Lelang::class, 'barang_id');
    }
}
