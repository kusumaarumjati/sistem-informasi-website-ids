<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\lokasi;
use Picqer;
use DB;
use PDF;

class lokasiTokoController extends Controller
{
    public function index(){
    	$lokasi = lokasi::all();
    	return view('pages/datatoko', compact('lokasi'));
    }

    public function toko_pdf($id)
    {
        $toko = DB::table('lokasi_toko')->where('barcode',$id)->get();
        $toko_barcode=$id;
        $pdf = PDF::loadview('pages/PDF_toko',['toko'=>$toko,'toko_barcode'=>$toko_barcode])->setPaper('a4');
        return $pdf->stream();
        // return view('geolocation/toko-barcode',['toko'=>$toko,'id_toko'=>$id_toko]);
    }

    public function titikkunjungan(){
        $lokasi = lokasi::all();
        return view('pages/titik-kunjungan', compact('lokasi'));
    }

    public function findToko(Request $request){
        $data = lokasi::select('barcode', 'nama_toko', 'latitude', 'longitude', 'accuracy')
        ->where('barcode', $request->tk_id)
        ->get();
        return response()->json($data);
    }


    
}
