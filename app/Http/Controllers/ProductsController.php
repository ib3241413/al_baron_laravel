<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

use App\Models\ProductType;

class ProductsController extends Controller
{
     
    public function index(Request $request)
{

    $typeId = $request->input('type_id');
    $searchQuery = $request->input('search');

    $productsQuery = Product::with('vendor');

    if ($typeId) {
        $productsQuery->where('Type_id', $typeId);
    }

    if ($searchQuery) {
        $productsQuery->where('product_name', 'like', '%'.$searchQuery.'%');
    }

    $products = $productsQuery->get();

    $productsWithType = $products->map(function ($product) {
        $productType = ProductType::find($product->Type_id);
        $product->type_name = $productType ? $productType->type_name : 'N/A';
        return $product;
    }); 

    return view('products.index', [
        'products' => $productsWithType,
        'productTypes' => ProductType::all(),
        'selectedType' => $typeId,
        'searchQuery' => $searchQuery
    ]);
}


    public function create()
    {

    $productTypes = ProductType::all();
    $admin = Auth::guard('admin')->user();
    $vendor1 = Auth::guard('vendor')->user();

    if ($admin instanceof Admin) {
        $vendors = Vendor::all();
        return view('products.create', compact('productTypes', 'vendors'));
    } elseif ($vendor1 instanceof Vendor) {
        $vendor = $vendor1;
        return view('products.create', compact('productTypes', 'vendor'));
    }
    abort(403, 'Unauthorized access');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:45',
            'price' => 'required|integer',
            'description' => 'required|string|max:255',
            'products_count' => 'required|integer',
            // 'Vendor_id' => 'required|integer',
            'Type_id' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
    
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->products_count = $request->input('products_count');

        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $product["image"] = '/storage/'.$path;
        // if ($request->hasFile('image')) {
           
        //     if ($product->image) {
        //         Storage::disk('public')->delete($product->image);
        //     }
    
        //     $imagePath = $request->file('image')->store('images', 'public');
        //     $product->image = $imagePath;
        // }

        if (Auth::guard('vendor')->check()) {
            $product->Vendor_id = Auth::guard('vendor')->user()->Vendor_id;
        } else {
            $vendorId = $request->input('Vendor_id');
            $product->Vendor_id = $vendorId;
        }
        $product->Type_id = $request->input('Type_id');

        
        $product->save();
       
        return redirect()->route('products.index');
    }

    public function show($Product_id)
    {
        $product = Product::findOrFail($Product_id);
        return view('products.show', ['product' => $product]);
    }

    public function edit($Product_id)
    {
        $product = Product::find($Product_id);
    $productTypes = ProductType::all();
    $vendors = Vendor::all();
    return view('products.edit', ['product' => $product, 'productTypes' => $productTypes, 'vendors' => $vendors]);
    }

    public function update(Request $request, $Product_id)
    {
        $request->validate([
            'product_name' => 'required|string|max:45',
            'price' => 'required|integer',
            'description' => 'required|string|max:255',
            'products_count' => 'required|integer',
            'Vendor_id' => 'required|integer',
            'Type_id' => 'required|integer'
        ]);

        $product = Product::findOrFail($Product_id);
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->products_count = $request->input('products_count');
        $product->Vendor_id = $request->input('Vendor_id');
        $product->Type_id = $request->input('Type_id');
        $product->save();
        
        return redirect()->route('products.show', ['product' => $product->Product_id]);

    }

    public function destroy($Product_id)
    {
        Product::destroy($Product_id);
        return redirect()->route('products.index');
    }
}
