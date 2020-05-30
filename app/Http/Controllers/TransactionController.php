<?php

namespace App\Http\Controllers;
use App\transaction;
use App\product;
use App\customer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index () {
        $customer = transaction::with('product', 'customer')->get();
        return response([
            'success' => true,
            'data' => $customer
        ], 200);
    }

    public function store(Request $request) {
        $post = transaction::create([
            'customer' => $request->input('customer'),
            'product' => $request->input('product')
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
        $transaction = transaction::where('customer', $id)->get();

        $data_product = array();
        foreach($transaction as $temp) {
            $product = product::where('id', $temp->product)->first();
            $data_product[] = $product;
        }

        if ($transaction) {
            return response()->json([
                'success' => true,
                'transaction' => $transaction,
                'product' => $data_product
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 500);
        }
    }

    public function update(Request $request) {
        $update = transaction::whereId($request->input('id'))->update([
            
            'customer' => $request->input('customer'),
            'product' => $request->input('product')
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
        $delete = transaction::findOrFail($id);
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
