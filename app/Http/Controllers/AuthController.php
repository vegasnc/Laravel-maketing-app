<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('index');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'     => 'required|email',
            'password'  => 'required|string'
        ];

        $messages = [
            'email.required'    => 'Email wajid di isi',
            'email.email'       => 'Email tidak valid',
            'password.required' => 'Password wajib di isi',
            'password.string'   => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withError($validator)->withInput($request->all);
        }
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        Auth::attempt($data);

       if (Auth::check($request->only('email','password'))) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function showRegister()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $rules = [
                'email'                 => 'required|email|unique:users,email',
                'name'                  => 'required|min:3|max:35',
                'password'              => 'required|confirmed'
            ];
      
            $messages = [
                'password.required'     => 'Password wajib diisi',
                'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
            ];
      
            $validator = Validator::make($request->all(), $rules, $messages);
      
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
      
            $user = new User;
            $user->email = strtolower($request->email);
            $user->name = ucwords(strtolower($request->name));
            $user->password = Hash::make($request->password);
            $user->email_verified_at = \Carbon\Carbon::now();
            $simpan = $user->save();
      
            if($simpan){
                Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
                return redirect()->route('login');
            } else {
                Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
                return redirect()->route('register');
            }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('logout');
    }
}
