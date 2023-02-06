<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        // $passcode = Hash::check($request->password, $user->password);
        // dd($passcode);
        // $passcode = User::where('password', $request->password)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user);
            if ($user->role == '1') {
                return redirect()->route('admindashboard')->with('success', "welcome $user->name");
            } else {
                return redirect()->route('userdashboard')->with('success', "welcome $user->name");
            }
        } else {
            return back()->with('error', 'invalid credentials');
        }
    }
}
