<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::get();
        return CustomResponse::response(0, 'Success get data', $products);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            $getMessage = $validator->errors();
            return CustomResponse::response(144, 'Validation Failed', $getMessage);

        }
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
