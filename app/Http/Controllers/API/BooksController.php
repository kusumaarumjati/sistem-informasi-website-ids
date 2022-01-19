<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use DB;

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
    //menampilkan view addbook
    public function create()
    {
        return view('pages.addbook');
    }

    //ngepost data
    public function tambahBook(Request $request)
    {  
        $url = 'localhost:8080/api/books';
        $ch = curl_init();
        $data=array(
            'name' => $request->name,
            'author' => $request->author,
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $arrVal = json_decode($server_output, true);

        return redirect('/book');
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
        $book=DB::table('books')->where('id',$id)
        ->get();

        $data=array(
            'book' => $book,
          
        );
        return view('pages.editbook',$data);
    }

    public function updateBook(Request $request, $id)
    {  
        $url = "localhost:8080/api/books/$id";
        $ch = curl_init();
        $data=array(
            'name' => $request->name,
            'author' => $request->author,
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $arrVal = json_decode($server_output, true);
        // var_dump($data);

        return redirect('/book');
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

     public function hapus($id)
     {
         $url="localhost:8080/api/books/$id";
         
         $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $url);
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
         $response = curl_exec($curl);
         curl_close($curl);
         // var_dump($id);
 
         return redirect('/book');
     }

     public function book()
    {
        $url = 'localhost:8080/api/books';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        $server_output = curl_exec($ch);
        curl_close ($ch);
        $arrVal = json_decode($server_output, true);

        // $arrVal["menu"] = "book";
        // $arrVal["submenu"] = "";
        $data = array(
            'menu' => 'book',
            'book' => $arrVal,
            'submenu' => '',
        );

        // dd($data);

        return view('pages.databook',$data); 
    }

    }

