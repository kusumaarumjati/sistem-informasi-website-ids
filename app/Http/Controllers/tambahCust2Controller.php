<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\customer;
use \App\Models\city;
use \App\Models\district;
use \App\Models\subdis;
use \App\Models\province;
use Illuminate\Support\Facades\Storage;
class tambahCust2Controller extends Controller
{
    public function index(){
        $customer = customer::all();
        $city = city::all();
        $district = district::all();
        $subdis = subdis::all();
        $province = province::all();
        return view('pages/tambahcust2', compact('customer', 'city', 'district', 'subdis','province'));
        //return view('pages/tambah_customer1', compact('customer', 'subdis','postal'));
    }

    public function simpan(Request $request){
        //dd($request);
       $this->validate($request,[
           //'id_customer' => 'required',
           'nama'=>'required',
           'alamat'=>'required',
           'foto'=>'required',
           'filepath'=>'required',
           'prov_id' => 'required',
           'subdis_id' => 'required'
       ]);
       $image = str_replace('data:image/jpeg;base64', '', $request->filepath);
       $image = str_replace(' ','+', $image);
       $imageNama = $request->nama.time(). '.png';
       $path = Storage::disk('local')->put($imageNama,base64_decode($image));
      // dd($request);
       customer::create([
           'id_customer' => null,
           'nama' => $request->nama,
           'alamat' => $request->alamat,
           'foto' => $request->foto,
           'filepath' => $imageNama,
           'prov_id' => $request->prov_id,
           'subdis_id' => $request->subdis_id
       ]);
       return redirect('/datacust')->with('success','Data berhasil ditambahkan');
   }

   public function findKota($id)
   {
       $data = city::select('city_id', 'city_name')
       ->where('prov_id',$id)
       ->get();
       return response()->json($data);
   }

   public function findKecamatan($id)
   {
       $data = district::select('dis_id', 'dis_name')
       ->where('city_id',$id)
       ->get();
       return response()->json($data);
   }

   public function findKelurahan($id)
   {
       $data = subdis::select('subdis_id', 'subdis_name')
       ->where('dis_id',$id)
       ->get();
       return response()->json($data);
   }

   public function findKodepos($id)
   {
       $data = subdis::select('subdis_id', 'kdpos')
       ->where('subdis_id',$id)
       ->get();
       return response()->json($data);
   }
}
