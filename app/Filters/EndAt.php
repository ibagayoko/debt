<?php

namespace App\Filters;

use Illuminate\Support\Facades\DB;

class EndAt extends Filter 
{
    protected $name = 'date';
    public function applyFilter($builder)
    {
        return $builder->where($this->filterName(),'<=', request('end_at'));
    }
}
