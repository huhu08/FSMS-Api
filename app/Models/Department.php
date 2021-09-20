<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
     protected $fillable = [
      'Department_name',
      'user_id',
      'status',
      'update_user',
     ];

}
