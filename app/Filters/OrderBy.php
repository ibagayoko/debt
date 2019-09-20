<?php

namespace App\Filters;

class OrderBy extends Filter 
{
    protected $name = 'order_by';
    public function applyFilter($builder)
    {
        return $builder->orderBy(request('order_by'), request('sort') ?? 'asc');
    }
}
