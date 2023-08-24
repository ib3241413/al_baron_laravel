<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Model implements Authenticatable
{
    use HasFactory;

    use HasFactory, Notifiable;

    // ...

    public function getAuthIdentifierName()
    {
        return 'Customer_id';
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

    protected $table = 'Customers';
    protected $primaryKey = 'Customer_id';
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'birth_date', 'phone', 'email', 'password', 'address'];
    
}
