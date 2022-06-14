<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function peminjaman()
    {
        return $this->hasMany(User::class, 'id', 'id_mobil', 'nama_mobil', 'harga_sewa_mobil');
    }

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id', 'id_mobil', 'nama_mobil', 'harga_sewa_mobil');
    }
}
