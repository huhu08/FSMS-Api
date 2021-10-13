<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectiveAction extends Model
{
   
    use HasFactory;
    protected $table = ' corrective_action';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'non_conformity_id',
        'corrective_action',
        'request_review',
        'preventive_action',
        'quality_office_id',
        'entered_date',
        'note',
        'update_user',
        'user_id',
        'status',
    ];
}
