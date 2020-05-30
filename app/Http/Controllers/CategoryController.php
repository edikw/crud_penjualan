<?php

namespace App\Http\Controllers;
use App\category;
use App\product;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    
    public function index () {
        $categories = category::latest()->get();
        return response([
            'success' => true,
            'data' => $categories
        ], 200);
    }

    public function store(Request $request) {
        $post = category::create([
            'name' => $request->input('name')
        ]);

        if( $post ) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil di simpan'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data gagal di simpan'
            ], 400);
        }
    }

    public function getId($id) {
        $get = category::whereId($id)->first();
        $getProduct = product::where('category', $id)->get();

        if ($get) {
            return response()->json([
                'success' => true,
                'message' => 'Detail data!',
                'product' => $getProduct,
                'category' => $get
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    public function update(Request $request) {
        $update = category::whereId($request->input('id'))->update([
            'name' => $request->input('name')
        ]);

        if( $update ) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Diupdate!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal Diupdate!',
            ], 500);
        }
    }

    public function delete($id) {
        $delete = category::findOrFail($id);
        $delete->delete();

        if( $delete ) {
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
