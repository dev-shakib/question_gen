<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Exception;
use Validator;
use Auth;

class TeacherAuthController extends Controller
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

        if(filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            if(User::where(['status'=>1,'email'=>$request->username])->count() == 0)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'Teacher Currently Not Approved'
                ]);
            }
            Auth::guard('teacher')->attempt(['email' => $request->username, 'password' => $request->password]);
        } else {
            if(User::where(['status'=>1,'username'=>$request->username])->count() == 0)
            {
                return response()->json([
                    'success' => false,
                    'message' => 'Teacher Currently Not Approved'
                ]);
            }
            Auth::guard('teacher')->attempt(['username' => $request->username, 'password' => $request->password]);
        }
        if (Auth::guard('teacher')->check()) {

            $token = auth()->guard('teacher')->user()->createToken('passport_token')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'Teacher login succesfully, Use token to authenticate.',
                'token' => $token
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Teacher authentication failed.',
            ], 401);
        }
    }
    public function register(Request $request)
    {

        $input = $request->only(['firstname','lastname', 'username','email','password','phone','address','image']);

        $validate_data = [
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'username' => 'required|unique:users|min:3',
            'email' => 'required|unique:users|min:3',
            'password' => 'required|min:6|max:20',
            'phone' => 'required|min:3',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }

        $User_role = Role::where(['name'=>'teacher'])->first();
        if(request()->file('image')){
            $file= request()->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/teacher'), $filename);
        }
        $teacher = User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'image' => $filename,
            'address' => $request['address'],
        ]);
        $teacher->attachRole($User_role);
        $accessToken = $teacher->createToken('authToken')->accessToken;
        return response()->json([
            'success' => true,
            'message' => 'Teacher Created Successfully',
            'access_token' => $accessToken
        ], 201);
    }
}
