<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Model implements Authenticatable
{
    use HasFactory, Notifiable;

    public function getAuthIdentifierName()
    {
        return 'Vendor_id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    protected $table = 'Vendors';
    protected $primaryKey = 'Vendor_id';
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'birth_date', 'phone', 'email', 'password', 'address'];
   
    public function products()
    {
        return $this->hasMany(Product::class, 'Vendor_id');
    }   
}
