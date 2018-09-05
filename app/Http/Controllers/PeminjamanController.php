<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\Alat;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alat()
    {
        //
        $alat = Alat::all();       
        // $alat = alat::orderBy('created_at','desc')->paginate(5);       
        return view('alat',compact('alat'));
        
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        //
        $nama = $request->nama;
        $stok = $request->stok;
        $biaya = $request->biaya;
        
        $alat = new \App\Alat;
        $alat->nama = $nama;
        $alat->stok = $stok;
        // $alat->biaya = $biaya;
        $alat->save();

        return redirect()->action('PeminjamanController@alat');
        
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
        $nama = $request->nama;
        $namaktm = $request->namaktm;
        $email = $request->email;
        $hp = $request->hp;
        $ukm = $request->ukm;
        $alat = $request->alat;
        $tanggalkembali = $request->tanggal;
        $jumlah = $request->jumlah;
        $biaya = $request->biaya;
        
        if(is_null($email)){
            $email = "-";
        }
    
        $peminjaman = new \App\Peminjaman;
        $peminjaman->nama = $nama;
        $peminjaman->namaktm = $namaktm;
        $peminjaman->email = $email;
        $peminjaman->hp = $hp;
        $peminjaman->ukm = $ukm;
        $peminjaman->alat = $alat;
        $peminjaman->tanggalkembali = $tanggalkembali;
        $peminjaman->jumlah = $jumlah;
        $peminjaman->biaya = $biaya;
        $peminjaman->save();
        
        return redirect()->action('PeminjamanController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
        $peminjaman = Peminjaman::all();       
        // $peminjaman = Peminjaman::orderBy('created_at','desc')->paginate(5);       
        return view('lihat',compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
