<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pesanan()
    {
        return $this->hasMany(Peminjaman::class, 'id', 'id_supir');
    }
}
