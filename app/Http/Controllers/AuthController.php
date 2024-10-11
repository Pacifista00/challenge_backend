<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm(){
        return view('login');
    }
    public function registerForm(){
        return view('register');
    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:32'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'passwordConfirm' => ['required', 'string', 'min:8', 'same:password'],
        ]);
    
        if ($validator->fails()) {
            return redirect('/register-form')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
        return redirect('/');
    }
    public function login(Request $request) {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'max:32'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
    
            return redirect()->intended('film');
        }
    
        return redirect('/')
                    ->withErrors(['login' => 'Not valid account.'])
                    ->withInput();
    }    
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
