<?php

namespace App\Filters;

class ByCustomer extends Filter 
{
    protected $name = 'customer_id';
    public function applyFilter($builder)
    {
        return $builder->where($this->name, request('customer_id'));
    }
}
