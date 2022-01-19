<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data keseluruhan
        $book=Book::all();

        return response()->json([
            $book
        ], 200);
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
        //mengisi ke database
        if(!isset($request->name) || !isset($request->author)){
            return response()->json([
                "message" => "Book notes cannot be updated"
            ], 400);
        }
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();

        return response()->json([
            "status" => "Success",
            "message" => "Book record created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //buat manggil spesifik
         $book = Book::find($id);

         return response()->json([
             $book
         ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //mengubah di database
        if(!isset($request->name) || !isset($request->author)){
            return response()->json([
                "message" => "Book notes cannot be updated"
            ], 400);
        }
        
        $book = Book::find($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();
    
        return response()->json([
            "status" => "Success",
            "message" => "Book record updated"
        ], 201);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //buat menghapus
        $book = Book::find($id);
        $book->delete();

        return response()->json([
            "status" => "Success",
            "message" => "Book data deleted successfully"
        ], 200);
    }
}