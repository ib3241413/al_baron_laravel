<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
{
    
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customers.create');
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

        $customer = new Customer();
        $customer->first_name = strip_tags($request->input('first_name'));
        $customer->last_name = strip_tags($request->input('last_name'));
        $customer->birth_date = strip_tags($request->input('birth_date'));
        $customer->phone = strip_tags($request->input('phone'));
        $customer->email = strip_tags($request->input('email'));
        // $customer->password = strip_tags($request->input('password'));
        $customer->password = Hash::make($request->input('password'));

        $customer->address = strip_tags($request->input('address'));
        $customer->save();

        return redirect()->route('customers.index');
    }

    public function show($Customer_id)
    {
        $customer = Customer::find($Customer_id);
        return view('Customers.show', ['customer' => $customer]);
    }

    public function edit($Customer_id)
    {
        $customer = Customer::find($Customer_id);
        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request, $Customer_id)
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

        $customer = Customer::find($Customer_id);
        $customer->first_name = strip_tags($request->input('first_name'));
        $customer->last_name = strip_tags($request->input('last_name'));
        $customer->birth_date = strip_tags($request->input('birth_date'));
        $customer->phone = strip_tags($request->input('phone'));
        $customer->email = strip_tags($request->input('email'));
        // $customer->password = strip_tags($request->input('password'));
        $customer->password = Hash::make($request->input('password'));

        $customer->address = strip_tags($request->input('address'));
        $customer->save();
        
        return redirect()->route('customers.index');
    }

    public function destroy($Customer_id)
    {
        $customer = Customer::find($Customer_id);
        $customer->delete();
        return redirect()->route('customers.index');
    }
}
