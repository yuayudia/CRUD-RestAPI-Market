<?php

use Illuminate\Database\Seeder;

class Suplier extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supliers')->insert([
            'nama_suplier' => 'Amigooid',
            'alamat' => 'Mataram',
            'telepon' => '082354651231',
            'pos' => '83114',
            'email' => 'amigooid@gmail.com'
        ]);
    }
}
