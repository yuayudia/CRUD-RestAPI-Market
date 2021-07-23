<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;
use App\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::with('suplier')->get();
        return response()->json($barangs);
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
        $validate = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'id_suplier' => 'required'
        ]);
        if ($validate->passes()) {
            $id_barang = Barang::create($request->all());
            return response()->json([
                'pesan' => 'Data berhasil ditambahkan',
                'data' => $id_barang
            ]);
        }
        return response()->json([
            'pesan' => 'Data gagal ditambahkan',
            'data' => $validate->errors()->all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_barang
     * @return \Illuminate\Http\Response
     */
    public function show($id_barang)
    {
        $data = Barang::where('id_barang', $id_barang)->first();
        if (!empty($data)) {
            return $data;
        }
        return response()->json(['pesan'=>'Data tidak ditemukan'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_barang)
    {
        $data = Barang::where('id_barang', $id_barang)->first();
        if (!empty($data)) {
            $validate = Validator::make($request->all(), [
                'nama_barang' => 'required',
                'deskripsi' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
                'stok' => 'required',
                'id_suplier' => 'required'
            ]);
            if ($validate->passes()) {
               $data->update($request->all());
               return response()->json([
                   'pesan' => 'Data berhasil di update',
                   'data' => $data
               ], 200);
            } else {
                return response()->json([
                    'pesan' => 'Data gagal di update',
                    'data' => $validate->errors()->all()
                ]);
            }
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_barang)
    {
        $data = Barang::where('id_barang', $id_barang)->first();
        if (empty($data)) {
            return response()->json(['pesan' => 'Data tidak ditemukan'], 404);
        }
       $data->delete();
       return response()->json(['pesan' => 'Data berhasil dihapus'], 200);
    }
}
