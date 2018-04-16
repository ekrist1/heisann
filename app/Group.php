<?php

namespace App;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;


class Group extends Model
{
    protected $guarded = ['id'];

    use ForTenants;

    public function scopeGroupToForm($query, $company_id) {
        return $query->withoutGlobalScopes()->where('company_id', $company_id);
    }

}
