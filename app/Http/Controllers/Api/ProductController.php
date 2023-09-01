<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello, World!',
            'status' => 200
        ]);
    }

    public function create()
    {
        // Logika untuk menampilkan form pembuatan data
    }

    public function store(Request $request)
    {
        // Logika untuk menyimpan data baru
    }

    public function show($id)
    {
        // Logika untuk menampilkan data berdasarkan ID
    }

    public function edit($id)
    {
        // Logika untuk menampilkan form edit data
    }

    public function update(Request $request, $id)
    {
        // Logika untuk mengupdate data
    }

    public function destroy($id)
    {
        // Logika untuk menghapus data
    }
}
