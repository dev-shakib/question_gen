<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use App\Models\Role;
use App\Models\Permission;
class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();


            $finduser = User::where('email', $user->user['email'])->first();

            if($finduser){

                Auth::guard('teacher')->login($finduser);
                $token = auth()->guard('teacher')->user()->createToken('passport_token')->accessToken;
                return redirect('/home');

            }else{
                $image = file_get_contents($user->user['picture']);

                $email = explode('@', $user->email);
                file_put_contents(public_path('public/teacher/'.$user->id.'.jpg'), $image);
                $newUser = User::create([
                    'firstname' => $user->user['given_name'],
                    'lastname' => $user->user['family_name'],
                    'username' => $email[0],
                    'email' => $user->email,
                    'phone' => "01",
                    'address' => "",
                    'image'=> $user->id.'.jpg',
                    'social_id'=> $user->id,
                    'social_type'=> 'google',

                    'password' => encrypt('my-google')
                ]);

                Auth::guard('teacher')->login($newUser);
                $token = auth()->guard('teacher')->user()->createToken('passport_token')->accessToken;
                return redirect('/home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
