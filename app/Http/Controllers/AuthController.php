<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLoginPage(){
        return view('login');
    }

    public function getRegisterPage(){
        return view('register');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function signIn(Request $request){
//        dd($request);
        $this->validate($request,[
            'email'=> 'required',
            'password'=> 'required',
        ]);

//        dd($request);
        $users = User::where('email', $request->email)->first();
//        dd($request);
        if ($users == null){
            return redirect()->back();
        }else{
            Auth::login($users);
            return redirect()->route('home')->with('success', 'Muvaffaqiyatli kirdingiz');
        }
    }

    public function signUp(Request $request){
//        dd($request);
        $this->validate($request,[
            'firstName'=> 'required',
            'lastName'=> 'required',
            'phoneNumber'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);

        $users = User::where('email', $request)->first();
        if ($users != null){
            return redirect()->route('login');
        }else{
            $users = new User();
            $users->firstName=$request->firstName;
            $users->lastName=$request->lastName;
            $users->phoneNumber=$request->phoneNumber;
            $users->email=$request->email;
            $users->password=Hash::make($request->password);
            $users->confirmPassword=Hash::make($request->confirmPassword);
            $users->rol=0;
            $users->save();
            return redirect(route('login'));
        }

    }
}
