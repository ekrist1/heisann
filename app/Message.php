<?php

namespace App;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;
use App\Facades\SodiumEncrypter;
use Carbon\Carbon;



class Message extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
        'updated_at',
        'time_live'
    ];

    use ForTenants;

    public function scopeDownload($query) {
        return $query->withoutGlobalScopes();
    }

    public function scopeRetrieveMessage($query, $url) {
        return $query->withoutGlobalScopes()->where('hashed_url', $url)->first()
            ->makeHidden(['password', 'is_read', 'company_id', 'hashed_url', 'id', 'is_received', 'received_from', 'received_phone','received_company']);
    }

    public function scopeRetrieveCompany($query, $url) {
        return $query->withoutGlobalScopes()->where('hashed_url', $url)->first()->company()->first()->secret_key;
    }

    public function scopeFindExpired($query) {
        return $query->withoutGlobalScopes()->where('created_at', '<=', Carbon::now()->subDays(14)->toDateTimeString());
    }

    public function files() {
        return $this->hasMany(File::class);
    }

    public function onetimecode() {
        return $this->hasOne(OnetimeCode::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function getBodyAttribute($value)
    {
        //return decrypt($value);
        //config()->set('app.sodium', $this->company()->first()->secret_key);
        return SodiumEncrypter::safeDecrypt($value);
    }
}
