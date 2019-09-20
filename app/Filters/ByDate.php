<?php

namespace App\Filters;

use Illuminate\Support\Facades\DB;

class ByDate extends Filter 
{
    protected $name = 'date';
    public function applyFilter($builder)
    {
        return $builder->where($this->filterName(), request('date'));
    }
}
