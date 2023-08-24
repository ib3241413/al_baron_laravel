<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Model implements Authenticatable
{
    
    use HasFactory, Notifiable;

    public function getAuthIdentifierName()
    {
        return 'Admin_id';
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

    protected $table = 'Admins';
    protected $primaryKey = 'Admin_id';
    public $timestamps = false;
    protected $fillable = ['first_name', 'last_name', 'birth_date', 'phone', 'email', 'password', 'address'];
}
