<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsNonConformity extends Model
{
    use HasFactory;
     
    protected $table = 'details_non_conformity';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'non_conformity_id',
        'description',
        'action',
        'descions',
        'problem_casuses',
        'apply_date',
        'update_user',
        'user_id',
        'status',
    ];
}

