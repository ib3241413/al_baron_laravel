<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $primaryKey = 'Product_id';
    public $timestamps = false;
    protected $fillable = ['product_name', 'price', 'description', 'products_count', 'Vendor_id', 'Type_id', 'image'];

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'Type_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'Vendor_id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products', 'Product_id', 'Cart_id');
    }

}

