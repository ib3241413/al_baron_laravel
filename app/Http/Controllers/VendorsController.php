<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendors.index', ['vendors' => $vendors]);
    }

    public function create()
    {
        return view('vendors.create');
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

        $vendor = new Vendor();
        $vendor->first_name = $request->input('first_name');
        $vendor->last_name = $request->input('last_name');
        $vendor->birth_date = $request->input('birth_date');
        $vendor->phone = $request->input('phone');
        $vendor->email = $request->input('email');
        // $vendor->password = $request->input('password');
        $vendor->password = Hash::make($request->input('password'));

        $vendor->address = $request->input('address');
        $vendor->save();

        return redirect()->route('vendors.index');
    }

    public function show($vendorId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        return view('vendors.show', ['vendor' => $vendor]);
    }

    public function edit($vendorId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        return view('vendors.edit', ['vendor' => $vendor]);
    }

    public function update(Request $request, $vendorId)
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

        $vendor = Vendor::findOrFail($vendorId);
        $vendor->first_name = $request->input('first_name');
        $vendor->last_name = $request->input('last_name');
        $vendor->birth_date = $request->input('birth_date');
        $vendor->phone = $request->input('phone');
        $vendor->email = $request->input('email');
        // $vendor->password = $request->input('password');
        $vendor->password = Hash::make($request->input('password'));

        $vendor->address = $request->input('address');
        $vendor->save();

        return redirect()->route('vendors.index');
    }

    public function destroy($vendorId)
    {
        $vendor = Vendor::findOrFail($vendorId);
        $vendor->delete();

        return redirect()->route('vendors.index');
    }
}
