<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];


    // relation to other models
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
    
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function laptop()
    {
        return $this->belongsTo(Laptop::class, 'laptop_id');
    }

    public function servicedetail()
    {
        return $this->hasMany(Servicedetail::class, 'service_id');
    }
}
