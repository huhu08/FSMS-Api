<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use HasFactory;
    protected $table = 'spare_parts';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'machine_id',
        'part_no',
        'unit_id',
        'note',
        'quantity',
        'update_user',
        'user_id',
        'status',
    ];
}
