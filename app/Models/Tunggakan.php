<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tunggakan extends Model
{
    use HasFactory;
    protected $table = 'tunggakan';
    protected $fillable = ['id_petugas', 'nisn', 'id_spp', 'bulan_tunggakan', 'total_tunggakan'];
}
