<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id', 'id_mobil', 'nama_mobil', 'harga_sewa_mobil');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
