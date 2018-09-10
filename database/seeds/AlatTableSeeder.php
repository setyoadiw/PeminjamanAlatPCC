<?php

use Illuminate\Database\Seeder;
use App\Alat;

class AlatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $alat = new Alat;

        $alat->nama = "Kipas Angin";
        $alat->kategori = "Alat Elektronik";
        $alat->noinventaris=('PCC/16/01/03');
        $alat->biaya = 12000;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 2;
        $alat->save();

    }
}
