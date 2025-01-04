<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(),
            [
                'username' => 'required', //kurang d, data menjadi uniq agar tidak ada duplikat
                'password' => 'required',
            ]
        );

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => "validation errors",
                'errors' => $validator->errors(),
                'data' => [],
            ], 422);
        }

        //cek username apakah ada di database
        $user = User::where('username', $request->username)->first();

        //jika user tidak ditemukan atau pwd salah
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'User/Password Salah', //pesan kesalahan
            ], 401);
        }

        //jika username & pwd benar, generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'succes',
            'message' => 'oke',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'token' => $token,
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        //mendapatkan usr sedang login dari token yg dikirim
        $user = $request->user();
        if ($user) {
            //hapus semua token pengguna (logout dari semua perangkat)
            $user->tokens()->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Logout Berhasil',
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan atau sudah logout',

            ], 404);
        }
    }
}
