<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ec2Estimate extends Model
{
    protected $fillable = [

        'user_id',
        'instance_type',
        'region',
        'operating_system',
        'instances',
        'hours',
        'storage',
        'monthly_cost'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}