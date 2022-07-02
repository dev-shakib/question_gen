<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Permission;
use Exception;
use Validator;
use Auth;
class AuthController extends Controller
{
    public function login(Request $request)
    {

        $input = $request->only(['username', 'password']);

        $validate_data = [
            'username' => 'required|min:3',
            'password' => 'required|min:6',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }

        // authentication attempt
        if (auth()->guard('admin')->attempt($input)) {

            $token = auth()->guard('admin')->user()->createToken('passport_token')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'Admin login succesfully, Use token to authenticate.',
                'token' => $token
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Admin authentication failed.',
            ], 401);
        }
    }
    public function register(Request $request)
    {

        $input = $request->only(['name', 'username','password']);

        $validate_data = [
            'name' => 'required|string|min:3',
            'username' => 'required|min:3',
            'password' => 'required|min:6|max:20',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }

        $admin_role = Role::where(['name'=>'admin'])->first();

        $admin = Admin::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
        ]);
        $admin->attachRole($admin_role);
        $accessToken = $admin->createToken('authToken')->accessToken;
        return response()->json([
            'success' => true,
            'message' => 'Admin Created Successfully',
            'access_token' => $accessToken
        ], 201);
    }

}
