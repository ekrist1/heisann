<?php

namespace App;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    protected $fillable = ['company_id', 'user_id', 'fingerprint', 'token_2fa_expiry', 'token_2fa'];

    use forTenants;

    public function user() {
        return $this->belongsTo(User::class);
    }

}
