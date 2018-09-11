<?php

namespace App\Http\Controllers;
use App\Alat;
use Illuminate\Http\Request;
use DB;
use App\Quotation;

class DataAlatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //
         $nama = $request->nama;
         $kategori = $request->kategori;
         $noinventaris = $request->noinventaris;
         $stok = $request->stok;
         $biaya = $request->biaya;
         $peminjaman = $request->peminjaman;
         $ket = $request->ket;

         if(is_null($ket)){
            $ket = "-";
        }
         
         $alat = new \App\Alat;
         $alat->nama = $nama;
         $alat->kategori = $kategori;
         $alat->noinventaris = $noinventaris;
         $alat->stok = $stok;
         $alat->biaya = $biaya;
         $alat->peminjaman = $peminjaman;
         $alat->ket = $ket;
         $alat->save();
 
         return redirect()->action('PeminjamanController@alat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nama = $request->nama;
        $kategori = $request->kategori;
        $noinventaris = $request->noinventaris;
        $stok = $request->stok;
        $biaya = $request->biaya;
        $peminjaman = $request->peminjaman;
        $ket = $request->ket;

        $alat = Alat::find($id);
        $alat->nama = $nama;
        $alat->kategori = $kategori;
        $alat->noinventaris = $noinventaris;
        $alat->stok = $stok;
        $alat->biaya = $biaya;
        $alat->peminjaman = $peminjaman;
        $alat->ket = $ket;
        $alat->save();
 
        return redirect()->action('PeminjamanController@alat');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $alat = Alat::find($id);
        $alat -> delete();
        
        $table_name = "alats";

        DB::statement("SET @count = 0;");
        DB::statement("UPDATE `$table_name` SET `$table_name`.`id` = @count:= @count + 1;");
        DB::statement("ALTER TABLE `$table_name` AUTO_INCREMENT = 1;");
        return redirect()->back();
    }
}
