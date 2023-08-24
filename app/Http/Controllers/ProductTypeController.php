<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Psy\CodeCleaner\ReturnTypePass;

class ProductTypeController extends Controller
{
    public function index()
    {
       
        $productTypes = ProductType::all();
        return view('product-types.index', compact('productTypes'));
    }

    public function create()
    {
        return view('product-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        $productType = new ProductType();
        $productType->type_name = $request->input('type_name');
        $productType->save();

        return redirect()->route('product-types.index');
    }

    public function show($id)
    {
        $productType = ProductType::findOrFail($id);
        return view('product-types.show', compact('productType'));
    }

    public function edit($id)
    {
        $productType = ProductType::findOrFail($id);
        return view('product-types.edit', compact('productType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required|string|max:255',
        ]);

        $productType = ProductType::findOrFail($id);
        $productType->type_name = $request->input('type_name');
        $productType->save();

        return redirect()->route('product-types.index');
    }

    public function destroy($id)
    {
        $productType = ProductType::findOrFail($id);
        $productType->delete();

        return redirect()->route('product-types.index');
    }
}
