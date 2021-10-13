<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImplementationFollowUp extends Model
{
    use HasFactory;

    protected $table = 'implementation_follow_up';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [

        'non_conformity_id',
        'follow_up',
        'causes',
        'job',
        'update_user',
        'user_id',
        'status',
}
