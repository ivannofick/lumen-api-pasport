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
        return CustomResponse::response(0, 'Success Create Data');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $getProductModel = ProductModel::find($id);
        $input['stocks'] = $input['stocks'] + $getProductModel->stocks;
        $getProductModel->update($input);
        return CustomResponse::response(0, 'Success Update Data');

    }

    public function delete($id)
    {
        $productData = ProductModel::find($id);
        $productData->delete();
        return CustomResponse::response(0, 'Success Delete Data');

    }
}
