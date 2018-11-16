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
        $alat->noinventaris='PCC/16/01/03';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 2;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Steker T";
        $alat->kategori = "Alat Elektronik";
        $alat->noinventaris='PCC/16/01/10';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 2;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Backdrop (MMT)";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/01';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 21;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Bunga";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/02';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 6;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Karpet";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/07';
        $alat->biaya = 10000;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 2;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "TPS";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/09';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 2;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Nampan";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/11';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 3;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Tampah";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/19';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 2;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Taplak Meja Batik";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/22';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 17;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Tempat Tisu";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/23';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 13;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Tikar";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/24';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 3;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Vas Bunga";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/25';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 9;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Bendera PCC";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/26';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 1;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Bendera Merah Putih";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/27';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 1;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Bunga";
        $alat->kategori = "Dokumentasi dan Dekorasi";
        $alat->noinventaris='PCC/16/08/34';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 8;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Gelas";
        $alat->kategori = "Aset Tetap/Perlengkapan";
        $alat->noinventaris='PCC/16/05/06';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 12;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Kursi";
        $alat->kategori = "Aset Tetap/Perlengkapan";
        $alat->noinventaris='PCC/16/05/08';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 3;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Piring Plastik";
        $alat->kategori = "Aset Tetap/Perlengkapan";
        $alat->noinventaris='PCC/16/08/30';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 15;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Tenda";
        $alat->kategori = "Aset Tetap/Perlengkapan";
        $alat->noinventaris='PCC/16/05/17';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 1;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Teko Plastik";
        $alat->kategori = "Aset Tetap/Perlengkapan";
        $alat->noinventaris='PCC/16/05/21';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 1;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Piring Logam";
        $alat->kategori = "Aset Tetap/Perlengkapan";
        $alat->noinventaris='PCC/16/05/28';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 1;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Piring Kaca";
        $alat->kategori = "Aset Tetap/Perlengkapan";
        $alat->noinventaris='PCC/16/05/29';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 4;
        $alat->save();

        $alat = new Alat;
        $alat->nama = "Baskom";
        $alat->kategori = "Aset Tetap/Perlengkapan";
        $alat->noinventaris='PCC/16/05/30';
        $alat->biaya = 0;
        $alat->peminjaman = "Dipinjamkan";
        $alat->ket = "-";
        $alat->stok = 5;
        $alat->save();





    }
}
