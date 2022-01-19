<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scanBarcodeController extends Controller
{
    public function index(){
    return view('pages/scanner');
    }
}
