<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\barang;
use Picqer;
use PDF;
use DB;

class printBarcodeController extends Controller
{
    public function index(){
    	$barang = barang::all();
    	return view('pages/printbarcode', compact('barang'));
    }

//     public function simpan(Request $request){
//     	//dd($request);
//     	$number = $request->id_barang;
//     	$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
// 		$barcode = $generator->getBarcode($number, $generator::TYPE_CODE_128);

// 		// $number = $request->id_barang;
// 		// $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
// 		// $barcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($number, $generator::TYPE_CODE_128)) . '">';

// 		$data = new barang;
// 		$data->id_barang= $request->id_barang;
// 		$data->nama = $request->nama;
// 		$data->timestamp =$timestamp;
// 		$data->save();

// 		 return redirect('/printbarcode')->with('success','Data berhasil ditambahkan');
// }

public function generatePDF(Request $request)
    {
        $dataa = $request->id_barang;
        $datab = explode(",", $dataa);
        $barang = DB::table('barang')->whereIn('id_barang', $datab)->get();
        $no = 1;
        $x = 1;
        $col = $request->col;
        $row = $request->row;
        $panjang=(($row-1)*5)+($col-1);
        $data = array(
            'menu' => 'Barcode',
            'barang' => $barang,
            'no' => $no,
            'x' => $x,
            'col' => $col,
            'row' => $row,
            'panjang' => $panjang,
            'submenu' => '',
        );
          
        $customPaper = array(0,0,611.7,469.47);
        return PDF::loadView('pages.PDF_view', $data)->setPaper($customPaper)->stream('barcode_barang.pdf');
    }
}