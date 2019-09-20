<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded =[];
    // protected $with = ['accounts'];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
