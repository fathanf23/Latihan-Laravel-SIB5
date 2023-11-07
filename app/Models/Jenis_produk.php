<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_produk extends Model
{
    use HasFactory;
    // mapping table
    protected $table = 'jenis_produk';
    // mapping kolom atau field
    protected $filetable = ['nama'];
    // relasi antara table

    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
