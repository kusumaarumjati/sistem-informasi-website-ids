<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\customer;
use \App\Models\city;
use \App\Models\district;
use \App\Models\subdis;
use \App\Models\province;
use Illuminate\Support\Facades\Storage;

class ajaxController extends Controller
{
    public function ajax_file(){
        $province = province::all();
        $customer = customer::all();
        $city = city::all();
        $district = district::all();
        $subdis = subdis::all();
        return view('ajax/ajax_file', compact('customer', 'city', 'district', 'subdis','province'));
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
