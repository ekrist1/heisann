<?php

namespace App;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class File extends Model
{
    use ForTenants;

    protected $guarded = ['id'];

    public function scopeRetrieveFiles($query, $id) {
        return $query->withoutGlobalScopes()->where('message_id', $id);
    }

    public function scopeDownloadFile($query, $id) {
        return $query->withoutGlobalScopes()->find($id);
    }

    public function scopeFindExpired($query) {
        return $query->withoutGlobalScopes()->where('created_at', '<=', Carbon::now()->subDays(14)->toDateTimeString());
    }

    public function messages() {
        return $this->belongsTo(Message::class);
    }
}
