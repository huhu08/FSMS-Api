<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDistributionPlan extends Model
{
    use HasFactory;
    protected $table = 'product_distribution_plan';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
       
        'machine_id',
        'brand',
        'quantity',
        'stop_time',
        'comments',
        'recived_by_id',
        'update_user',
        'status',
    ];
}
