<?php

namespace App\Filters;

use Illuminate\Support\Facades\DB;

class AmountLess extends Filter 
{
    protected $name = 'amnt_less';
    public function applyFilter($builder)
    {
        return $builder->where('amount','<=', request('amnt_less'));
    }
}
