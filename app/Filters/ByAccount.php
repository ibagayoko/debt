<?php

namespace App\Filters;

class ByAccount extends Filter 
{
    protected $name = 'account_id';
    public function applyFilter($builder)
    {
        return $builder->where($this->name, request('account_id'));
    }
}
