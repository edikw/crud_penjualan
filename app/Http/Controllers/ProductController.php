<?php

namespace App\Http\Controllers;
use App\category;
use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () {
        $product = product::with('category')->get();
        return response([
            'success' => true,
            'data' => $product
        ], 200);
    }

    public function store(Request $request) {
        $post = product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'stock' => $request->input('stock')
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

    public function update(Request $request) {
        $update = product::whereId($request->input('id'))->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'stock' => $request->input('stock')
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
        $delete = product::findOrFail($id);
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
