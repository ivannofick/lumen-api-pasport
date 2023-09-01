<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        $products = UsersModel::orderBy('id', 'asc');
        if (isset($input['search'])) {
            $products = $products->where('name', 'like', "%{$input['search']}%");
        }
        $products = $products->skip($input['skip'])->take($input['take'])->get();
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
        UsersModel::create($input);
        return CustomResponse::response(0, 'Success Create Data');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $getUsersModel = UsersModel::find($id);
        $input['stocks'] = $input['stocks'] + $getUsersModel->stocks;
        $getUsersModel->update($input);
        return CustomResponse::response(0, 'Success Update Data');
    }

    public function delete($id)
    {
        $productData = UsersModel::find($id);
        $productData->delete();
        return CustomResponse::response(0, 'Success Delete Data');
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $getMessage = $validator->errors();
            return CustomResponse::response(144, 'Validation Failed', $getMessage);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $data['name'] =  $user->name;
        return CustomResponse::response(0, 'Account created successfully');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                return CustomResponse::response(0, 'Login Successfully', $token);
            } else {
                $response = ["message" => "Password mismatch"];
                return CustomResponse::response(144, 'Password mismatch');

            }
        } else {
            $response = ["message" => 'User does not exist'];
            return CustomResponse::response(144, 'User does not exist');
        }
    }
}