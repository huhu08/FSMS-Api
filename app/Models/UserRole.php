<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_role',
        'user_id',
        'status',
        'update_user',
    ];

    // Relations

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
