<?php

namespace App\Filters\Received;

use App\Filters\FilterAbstract;
use Illuminate\Database\Eloquent\Builder;

class GroupFilter extends FilterAbstract
{
    public function filter(Builder $builder, $value)
    {
        return $builder->where('name', 'LIKE', '%' . $value . '%');

    }
}