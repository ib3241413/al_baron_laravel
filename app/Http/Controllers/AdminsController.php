<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function welcome(){
        return "hi welcome";
    }
   
    public function index()
    {
        $admins = Admin::all();
      return view('admins.index', compact('admins'));
    }
   //______________________________________________________________________________________

   public function create()
   {
       return view('admins.create');
   }
   
   public function store(Request $request)
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
   
       $admin = new Admin();
       $admin->first_name = $request->input('first_name');
       $admin->last_name = $request->input('last_name');
       $admin->birth_date = $request->input('birth_date');
       $admin->phone = $request->input('phone');
       $admin->email = $request->input('email');
    //    $admin->password = $request->input('password');
    $admin->password = Hash::make($request->input('password'));
       $admin->address = $request->input('address');
       $admin->save();
   
       return redirect()->route('admins.index');
   }
   
   public function show($Admin_id)
   {
       $admin = Admin::findOrFail($Admin_id);
       return view('admins.show', compact('admin'));
   }
   
   public function edit($Admin_id)
   {
       $admin = Admin::findOrFail($Admin_id);
       return view('admins.edit', compact('admin'));
   }
   
   public function update(Request $request, $Admin_id)
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
   
       $admin = Admin::findOrFail($Admin_id);
       $admin->first_name = $request->input('first_name');
       $admin->last_name = $request->input('last_name');
       $admin->birth_date = $request->input('birth_date');
       $admin->phone = $request->input('phone');
       $admin->email = $request->input('email');
       $admin->password = Hash::make($request->input('password'));
 
       $admin->address = $request->input('address');
       $admin->save();
   
       return redirect()->route('admins.index');
   }
   public function destroy($Admin_id)
   {
       $admin = Admin::findOrFail($Admin_id);
       $admin->delete();
   
       return redirect()->route('admins.index');
   }
}
