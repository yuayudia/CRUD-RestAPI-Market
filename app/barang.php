<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $primaryKey = 'id_barang';
    public $timestamps = true;
    protected $fillable = ['nama_barang','deskripsi','harga_beli','harga_jual','stok','id_suplier'];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'id_suplier');
    }
}
