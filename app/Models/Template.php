<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $fillable = [
        'Template_name',
        'Procedure_Id',
        'name',
        'user_id',
        'status',
        'update_user',

       ];
}
