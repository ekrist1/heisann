<?php

namespace App\Filters\Product;

use App\Filters\FiltersAbstract;
use App\Filters\Received\{GroupFilter, NameFilter};
use Illuminate\Database\Eloquent\Builder;
Use Illuminate\Http\Request;

class ReceivedFilters extends FiltersAbstract
{
    protected $filters = [
        'group' => GroupFilter::class,
        'name' => NameFilter::class,
    ];
}
