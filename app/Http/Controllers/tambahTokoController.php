<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\lokasi;

class tambahTokoController extends Controller
{
    public function index(){
        $lokasi = lokasi::all();
        return view('pages/tambahtoko', compact('lokasi'));
        //return view('pages/tambah_customer1', compact('customer', 'subdis','postal'));
    }
 
    public function simpan(Request $request){
         //dd($request);
        $this->validate($request,[
            
           // 'barcode'=>'required',
            'nama_toko'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'accuracy' => 'required'
        ]);
        lokasi::create([
            //'barcode' => $request->barcode,
            'nama_toko' => $request->nama_toko,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'accuracy' => $request->accuracy
           
        ]);
        return redirect('/datatoko')->with('success','Data berhasil ditambahkan');
    }

   
 
}
