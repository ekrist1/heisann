<?php

namespace App;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $guarded= ['id'];

    use ForTenants;
}
