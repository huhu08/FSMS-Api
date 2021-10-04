<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRecord extends Model
{
    use HasFactory;

    
    protected $table = 'details_record';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'name',
        'operation_no',
        'field_id',
        'content',
        'update_user',
        'user_id',
        'status',
    ];
}
