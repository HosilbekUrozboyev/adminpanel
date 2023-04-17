<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Debt extends Model
{
    use HasFactory;

    protected $guarded = [];

    public  function user(){
           return $this->belongsTo(User::class, 'user_id');
    }

    public  function customers(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public  function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
