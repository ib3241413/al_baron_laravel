<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Admin;
use App\Models\Vendor;

use Illuminate\Support\Facades\Hash;


class CustomAuthController extends Controller
{
    public function hom()
    {
        return view('/welcome');
    }

    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]); 

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/welcome')->with('message', 'Signed in!');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/welcome')->with('message', 'Signed in as admin!');
        }elseif (Auth::guard('vendor')->attempt($credentials)) {
            return redirect()->intended('/welcome')->with('message', 'Signed in as vendor!');
        }
       
        return redirect('/login')->with('message', 'Login details are not valid!');
    }
    public function signup()
    {
        return view('registration');
    }


    public function signupsave(Request $request)
    {  
        $request->validate([
            'first_name' => 'required|string|max:45',
            'last_name' => 'required|string|max:45',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:12',
            'email' => 'required|string|max:70',
            'password' => 'required|string|max:12',
            'address' => 'required|string|max:45',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect()->route('products.index' );
    }

    public function create(array $data)
    {
      return Customer::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'birth_date' => $data['birth_date'],
        'phone' => $data['phone'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'address' => $data['address'],
        
      ]);
    }   
    public function dashboard(){

        if (Auth::guard('web')->check()) {
            return view('home.index');
        } elseif (Auth::guard('admin')->check()) {
            return redirect()->route('/welcome');
        }elseif (Auth::guard('vendor')->check()) {
            return redirect()->route('/welcome');
        }    
        return redirect('/login');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('login');
    }
}
