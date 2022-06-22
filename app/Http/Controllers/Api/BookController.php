<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\book;
use App\Helpers\FormatApi;
use Exception;

//Menggunakan Perintah  (php artisan make:controller Api/BookController --resouce) --> penting!!

class BookController extends Controller
{

    public function __construct()
    {   

        // $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = book::all();

        if($data)
        {
            return FormatApi::createApi(200, 'Data book berhasil diambil', $data);
        }
        else
        {
            return FormatApi::createApi(404, 'Data book tidak ditemukan');
        }
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
        try{
            $request->validate([
                'name_book' => 'required',
                'author_book' => 'required',
                'year_book' => 'required',
                'book_type' => 'required',
                'description' => 'required',
                'image_book' => 'required',
                'link' => 'required'
            ]);

            

            $book = book::create([
                'name_book' => $request->name_book,
                'author_book' => $request->author_book,
                'year_book' => $request->year_book,
                'book_type' => $request->book_type,
                'description' => $request->description,
                'image_book' => $request->image_book, 
                'link' => $request->link           
            ]);

            $data = book::where('id', $book->id)->first();

            if($data)
            {
                return FormatApi::createApi(200, 'Data book berhasil ditemukan', $data);
            }
            else
            {
                return FormatApi::createApi(400, 'Data book gagal ditemukan');
            }

        } catch(\Exception $error) {
            return FormatApi::createApi(400, $error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = book::where('id', $id)->first();

            if($data)
            {
                return FormatApi::createApi(200, 'Data book berhasil ditemukan', $data);
            }
            else
            {
                return FormatApi::createApi(400, 'Data book gagal ditemukan');
            }
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
        try{
            $request->validate([
               'author_book' => 'required',
               'year_book' => 'required',
               'book_type' => 'required',
               'description' => 'required',
               'image_book' => 'required',
               'link' => 'required'
                
           ]);

           $book = book::findOrFail($id);

           $book->update([
                'name_book' => $request->name_book,
                'author_book' => $request->author_book,
                'year_book' => $request->year_book,
                'book_type' => $request->book_type,
                'description' => $request->description,
                'image_book' => $request->image_book,
                'link' => $request->link
            ]);

            $data = book::where('id', $book->id)->first();

            if($data){   
                return FormatApi::createApi(200, 'Data book berhasil diubah', $data);
            }
            else{
                return FormatApi::createApi(400, 'Data book gagal diubah');
            }

        }catch(\Exception $error) {
           return FormatApi::createApi(400, $error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    try{
        $book = book::findOrFail($id);

        $data = $book->delete();
    
        if($data){
            return FormatApi::createApi(200, 'Data book berhasil dihapus');
        }
        else{
            return FormatApi::createApi(400, 'Data book gagal dihapus');
         }

     } catch(\Exception $error) {
            return FormatApi::createApi(400, $error->getMessage());
      }
        
    }
}
