<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRecord extends Model
{
    use HasFactory;

    protected $table = 'master_record';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'name',
        'template_id',
        'department_id',
        'date',
        'note',
        'content',
        'update_user',
        'user_id',
        'status',
    ];
}
