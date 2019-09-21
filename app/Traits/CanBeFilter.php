<?php

namespace App\Traits;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Builder;

/**
 * A filter scope for eloquent model
 */
trait CanBeFilter
{
    /**
     * Apply all relevant thread filters.
     *
     * @param  Builder       $query
     * @param  Array         $filters
     * @return Builder
     */
    public function scopeFilter(Builder $query, Array $filters)
    {
        return app(Pipeline::class)
        ->send($query)
        ->through($filters)
        ->thenReturn();
    }
}

