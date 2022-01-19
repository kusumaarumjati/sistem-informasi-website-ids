<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\customer;
use \App\Models\city;
use \App\Models\subdis;
use \App\Models\postal;
use \App\Models\province;

class DataCustController extends Controller
{
    public function index(){
        $customer = customer::all();
        // $city = city::all();
        // $district = district::all();
        $subdis = subdis::all();
        //$postal = postal::all();
        $province = province::all();
        // return view('pages/data_customer', compact('customer', 'city', 'district', 'subdis','postal','province'));
        return view('pages/datacust', compact('customer', 'subdis','province'));
    }
}

