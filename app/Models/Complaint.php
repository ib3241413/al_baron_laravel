<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table = 'Complaints';
    protected $primaryKey = 'Complaint_id';
    public $timestamps = false;
}
