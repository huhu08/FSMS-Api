<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterNonConformity extends Model
{
    use HasFactory;
    
    protected $table = 'master_non_conformity';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'department_id',
        'non_conformity_status_id',
        'auditor_name',
        'job',
        'responsible_by',
        'entered_date',
        'update_user',
        'user_id',
        'status',
    ];
}
