<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suplier extends Model
{
    protected $primaryKey = 'id_suplier';
    public $timestamps = true;
    protected $fillable = ['nama_suplier','alamat','telepon','pos','email'];
    
    public function barang()
    {
    return $this->hasMany(Barang::class, 'id_suplier');
    }
}
