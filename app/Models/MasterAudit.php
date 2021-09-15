<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAudit extends Model
{
    use HasFactory;

    protected $table = 'master_audit';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
       'department_id',
       'form_id',
       'Conformity',
       'note',
       'date_in',
       'user_id',
       'update_user',
       'update_date',
    ];
}
