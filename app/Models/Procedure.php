<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;
    protected $fillable = [
        'Procedure_name',
        'Department_id',
        'User_id',
        'name',
        'status',
        'update_user',

       ];
  
}
