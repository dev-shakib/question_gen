<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Role;
use App\Models\Permission;
use Exception;
use Validator;
use Auth;

class StudentAuthController extends Controller
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
        if(Student::where(['status'=>1,'username'=>$request->username])->count() == 0)
        {
            return response()->json([
                'success' => false,
                'message' => 'Student Currently Not Approved'
            ]);
        }

        // authentication attempt
        if (auth()->guard('student')->attempt($input)) {

            $token = auth()->guard('student')->user()->createToken('passport_token')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'Student login succesfully, Use token to authenticate.',
                'token' => $token
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Student authentication failed.',
            ], 401);
        }
    }
    public function register(Request $request)
    {

        $input = $request->only(['firstname','lastname', 'username','email','password','phone','address','image','class_id']);

        $validate_data = [
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'username' => 'required|unique:student|min:3',
            'email' => 'required|unique:student|min:3',
            'password' => 'required|min:6|max:20',
            'phone' => 'required|min:11',
            'class_id' => 'required',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }

        $student_role = Role::where(['name'=>'student'])->first();
        if(request()->file('image')){
            $file= request()->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/student'), $filename);
        }
        $student = Student::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'image' => $filename,
            'address' => $request['address'],
            'class' => $request['class_id'],
        ]);
        $student->attachRole($student_role);
        $accessToken = $student->createToken('authToken')->accessToken;
        return response()->json([
            'success' => true,
            'message' => 'Student Created Successfully',
            'access_token' => $accessToken
        ], 201);
    }
}
