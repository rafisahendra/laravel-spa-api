<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
// use Dotenv\Validator as DotenvValidator;
use Illuminate\Support\Facades\Validator;

class BiodataController extends Controller
{

    public function index()
    {
        $data = Biodata::latest()->get();
        return response([
            'success' => true,
            'message' => 'Data dari table Biodata',
            'data'    => $data
        ],200);
    }

    public function store(Request $request)
    {
        //validasi untuk data
        $validasi = Validator::make($request->all(),[
        'first_name' => 'required',
        'last_name'  => 'required',
            ],
            [
                'first_name.required'  => 'Masukan nama Depan',
                'last_name.required'   => 'Masukan nama Belakang',
            ]
        );

        if($validasi->fails()){ //valiasi untusk input
            //jika false
            return response()->json([
                'success' =>false,
                'message' =>'Silahkan isi bidang yang kosong !',
                'data'    =>$validasi->errors()
            ], 400);

        }else{
            //jika true
            $data  = Biodata::create([
                'first_name' => $request->input('first_name'),
                'last_name'  => $request->input('last_name')
            ]);

            if($data){ //valiasi untuk pesan json
                //Jika true
                return response()->json([
                    'success'   => true,
                    'message'   => 'Data biodata berhasil di input'
                ], 200);
            }else{
                //jika false
                return response()->json([
                    'success'   => false,
                    'message'   => 'Data gagagl disimpan'
                ], 400);
            }
        }
    }


    public function show($id)
    {
        $data = Biodata::whereId($id)->first();

        if($data){
            //jika data berhasil di ambil
            return response()->json([
                'success'   => true,
                'message'   => 'Data berhasil diiambil',
                'data'    => $data
            ],200);
        }else{
            return response()->json([
                'success'   => true,
                'message'   => 'Data gagal diambil',
                'data'    => ''
            ], 404);
            }
    }


    public function update(Request $request)
    {
        //untuk vaidasi form
        $validasi =validator::make($request->all(),[
            'first_name'   => 'required',
            'last_name'    => 'required'
        ],
            [
                'first_name.required'   =>'Masukan Nama Depan',
                'last_name.required'    =>'Masukan Nama Belakang'
            ]
        );

        if($validasi->fails()){
            //Jika validasi belum terpenuhi
            return response()->json([
                'succes'    =>false,
                'message'   =>'Silakan isi bidang yang kosong',
                'data'      => $validasi->errors()
            ],400);
        }else{
            // jika validasi selesai
            $data = Biodata::whereId($request->input('id'))->update([
                'first_name'    => $request->input('first_name'),
                'last_name'    => $request->input('last_name')
            ]);

            if($data){
                return response()->json([
                    'succes'    => true,
                    'message'   => 'Biodata Berhasil Di update'
                ],200);

            }else{
                return response()->json([
                    'success' => false,
                    'message' => 'Biodata Gagal Diupdate!',
                ], 500);
            }
        }
    }

    public function destroy($id)
    {
        $data = Biodata::findOrFail($id)->delete();
        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'data Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data Gagal Dihapus!',
            ], 500);
        }

    }

}
