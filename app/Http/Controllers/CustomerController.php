<?php

namespace App\Http\Controllers;
use App\customer;
use App\product;
use App\transaction;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index () {
        $customer = customer::with('transaction')->get();
        
        return response([
            'success' => true,
            'data' => $customer
        ], 200);
    }

    public function store(Request $request) {
        $post = customer::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
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

    public function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $data = customer::where('email', $email)->first();
        
        if( $data ) {
            return response()->json([
                'success' => true,
                'data' => $data
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak di temukan!',
            ], 500);
        }
    }

    public function update(Request $request) {
        $update = customer::whereId($request->input('id'))->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
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
        $delete = customer::findOrFail($id);
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
