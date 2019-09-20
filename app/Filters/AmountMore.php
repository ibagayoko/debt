<?php

namespace App\Filters;

use Illuminate\Support\Facades\DB;

class AmountMore extends Filter 
{
    protected $name = 'amnt_more';
    
    public function applyFilter($builder)
    {
        return $builder->where('amount','>=', request('amnt_more'));
    }
}
