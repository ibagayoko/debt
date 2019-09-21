<?php

namespace App\Models;

use App\Traits\CanBeFilter;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use CanBeFilter;
    //
    protected $guarded =[];
    // protected $with = ['customer'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
