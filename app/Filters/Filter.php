<?php

namespace App\Filters;
use  \Illuminate\Database\Eloquent\Builder;

abstract class Filter 
{
    protected $name = null;
    public function handle($request, \Closure $next)
    {
        if (!request()->filled($this->filterName())) {
            return $next($request);
        }

        $builder = $next($request);

        return $this->applyFilter($builder);
    }

    abstract protected function applyFilter(Builder $builder);

    protected function filterName(){
        return $this->name;
    }
}
