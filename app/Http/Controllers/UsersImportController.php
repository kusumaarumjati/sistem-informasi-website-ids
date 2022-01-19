<?php

namespace App\Http\Controllers;

use App\Imports\CustImport;
use App\Models\cust;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UsersImportController extends Controller
{
    public function show()
    {
       $menucust = 'menu';
        return view('pages.importexcel', compact('menucust'));
    }

     public function showdata()
    {
       $customer = cust::all();
        return view('pages.dataexcel', compact('customer'));
    }

    public function store(Request $request) 
    {
       $validatedData = $request->validate([
         'file' => 'required|mimes:csv,xls,xlsx'
    ]);

    $dataexcel = $request->file('file')->store('import');

    $import = new CustImport;
    $import->import($dataexcel);

    if($import->failures()->isNotEmpty()){
        return back()->withFailures($import->failures());
    } 

    return back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}