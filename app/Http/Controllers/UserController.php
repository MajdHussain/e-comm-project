<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //
    function login(Request $req){
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password ) || $user->is_banned)
        {
            return "Username or password not matched or user is banned";
        }
        else{
            if($user->is_admin){
                $req->session()->put('admin',$user);
                return redirect('/adminPage');
            }else{
            $req->session()->put('user',$user);
            return redirect('/');
            }
        }
    }
    function Register(Request $req){
    
         $inputs = [
            'email'    => $req->email,
             'password' => $req->password,
         ];

         $rules = [
             'email'    => 'required|email',
             'password' => [
                'required',
                'string',
                'min:8',             // must be at least 8 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&_]/', // must contain a special character
            ],
        ];
            $validation = \Validator::make( $inputs, $rules );

            if ( $validation->fails() ) {
                print_r( $validation->errors()->all() );
            }
        else{

        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        $req->session()->put('user',$user);
        return redirect('/');
        }
    }
}
