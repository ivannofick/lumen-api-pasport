<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\TemplateEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        $getUser = UsersModel::orderBy('id', 'asc');
        if (isset($input['search'])) {
            $getUser = $getUser->where('name', 'like', "%{$input['search']}%");
        }
        $getUser = $getUser->where('status','=', 1);
        $getUser = $getUser->skip($input['skip'])->take($input['take'])->get();
        return CustomResponse::response(0, 'Success get data', $getUser);
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
            'phone_number' => 'required',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            $getMessage = $validator->errors();
            return CustomResponse::response(144, 'Validation Failed', $getMessage);
        }

        $input = $request->all();
        $input['password'] = Str::random(5);
        $sendMail = $input;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $this->sendMail((object)$sendMail);
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
                $data = [
                    'access_token' => $token,
                    'name'  => $user->name,
                    'status'  => $user->status,
                    'email'  => $user->email,
                    'roles' => $user->roles
                ];
                return CustomResponse::response(0, 'Login Successfully', $data);
            } else {
                $response = ["message" => "Password mismatch"];
                return CustomResponse::response(144, 'Password mismatch');

            }
        } else {
            $response = ["message" => 'User does not exist'];
            return CustomResponse::response(144, 'User does not exist');
        }
    }

    public function sendMail($user)
    {
        $receiverEmail = $user->email;
        $emailData = ['message' => $user->password];
        
        Mail::to($receiverEmail)->send(new TemplateEmail($emailData));
        
        return 'Email telah dikirim!';
    }

    public function ping(Request $request)
    {
        return 'pong';
    }
}
