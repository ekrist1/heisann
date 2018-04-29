<?php

namespace App\Filters\Received;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class NameFilter extends FilterAbstract
{
    public function filter(Builder $builder, $value)
    {
        return $builder->where('from', 'LIKE', '%' . $value . '%');

    }
}