<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'nama_barang' => 'Fan Grill',
            'deskripsi' => 'Untuk memanggang daging dong',
            'harga_beli' => '185000',
            'harga_jual' => '200000',
            'stok' => '5',
            'id_suplier' => '1'
        ]);
    }
}
