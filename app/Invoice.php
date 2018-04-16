<?php

namespace App;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];

    use ForTenants;

    protected $casts = [
        'order_date' => 'date:d-m-Y'
    ];
}
