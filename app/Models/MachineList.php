<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineList extends Model
{
    use HasFactory;
    protected $table = 'machines_lists';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'equipment_name',
        'code',
        'area_id',
        'note',
        'update_user',
        'user_id',
        'status',
    ];
}
