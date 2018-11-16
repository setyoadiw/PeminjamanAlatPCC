<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use DB;
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
        $alat = Alat::where('peminjaman', 'Dipinjamkan')->get();

        $peminjaman = DB::table('peminjamen')
        ->select('peminjamen.id','peminjamen.nama','namaktm','hp','ukm','alats.nama as alat','tanggalkembali','jumlah','peminjamen.biaya','staff',
        'kembali','peminjamen.created_at')
        ->join('alats', 'alats.id', '=', 'peminjamen.alat_id')
        ->orderBy('created_at', 'desc')
        ->take(4)
        ->get();

        $count = DB::table('peminjamen')->count();

        return view('index',compact('alat'),compact('peminjaman'))->with('count',$count);;
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
    public function kembali(Request $request, $id)
    {
        //Apabila Alat Sudah Dikembalikan
        $peminjaman = Peminjaman::where('id', $id)->first();
        $peminjaman->kembali = 1;
        $id_alat = $peminjaman->alat_id;
        $peminjaman->save();

        $alat = Alat::where('id', $id_alat)->first();
        //Mengembalikan Stok
        $alat->stok = $alat->stok + $request->jumlah;
        $alat->save();

        return redirect()->back();
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
        $tanggalkembali = $request->tanggal;
        $jumlah = $request->jumlah;
        $biaya = $request->biaya;
        $staff = $request->staff;

        $data = explode("|" , $request->alat);
        $idalat = $data[0];
        
        $alat = Alat::where('id', $idalat)->first();
        $stok = $alat->stok;
        $alat->stok = $stok - $jumlah;

        if(is_null($email)){
            $email = "-";
        }
    
        $peminjaman = new \App\Peminjaman;
        $peminjaman->nama = $nama;
        $peminjaman->namaktm = $namaktm;
        $peminjaman->email = $email;
        $peminjaman->hp = $hp;
        $peminjaman->ukm = $ukm;
        $peminjaman->alat_id = $alat->id;
        $peminjaman->tanggalkembali = $tanggalkembali;
        $peminjaman->jumlah = $jumlah;
        $peminjaman->biaya = $biaya;
        $peminjaman->staff = $staff;
        $peminjaman->kembali = 0;

        if($stok > $jumlah){
            $peminjaman->save();
            $alat->save();
            
            return redirect()->action('PeminjamanController@index');
        }else{
            return redirect()->action('PeminjamanController@index')->with('update', 'Stok tidak mencukupi !');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Alat $alat)
    {
        //Join Table
        $peminjaman = DB::table('peminjamen')
        ->select('peminjamen.id','peminjamen.nama','namaktm','hp','ukm','alats.nama as alat','tanggalkembali','jumlah','peminjamen.biaya','staff',
        'kembali','peminjamen.created_at')
        ->join('alats', 'alats.id', '=', 'peminjamen.alat_id')
        ->get();
        
        return view('lihat',compact('alat'),compact('peminjaman'));
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
