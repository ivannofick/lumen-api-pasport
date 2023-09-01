<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::get();
        return response()->json([
            'data' => $products,
            'message' => 'Success get data',
            'status' => 200
        ]);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        ProductModel::create($input);
        return response()->json([
            'data' => [],
            'message' => 'Success Create Data',
            'status' => 200
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        ProductModel::whereId($id)->update($input);
        return response()->json([
            'data' => [],
            'message' => 'Success Update Data',
            'status' => 200
        ]);
    }

    public function delete($id)
    {
        $productData = ProductModel::find($id);
        $productData->delete();
        return response()->json([
            'data' => [],
            'message' => 'Success Delete Data',
            'status' => 200
        ]);
    }

}
