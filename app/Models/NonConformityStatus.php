<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonConformityStatus extends Model
{
    use HasFactory;
    
    protected $table = 'non_conformity_status';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'name',
        'nonconformity_status',
        'update_user',
        'user_id',
        'status',
    ];
}
