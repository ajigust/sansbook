<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\FormatApi;
use App\Models\User;
use Exception;

class UserListController extends Controller
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
        $data = User::all();

        if($data){
            return FormatApi::createApi(200, 'Data user berhasil diambil', $data);
        }
        else{
            return FormatApi::createApi(404, 'Data user tidak ditemukan');
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
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::where('id', $id)->first();

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
       //
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
            $user = User::findOrFail($id);

            $data = $user->delete();
    
            if($data)
            {
                return FormatApi::createApi(200, 'Data book berhasil dihapus');
            }
            else
            {
                return FormatApi::createApi(400, 'Data book gagal dihapus');
            }

        } catch(\Exception $error) {
            return FormatApi::createApi(400, $error->getMessage());
        }
        
    }
}
