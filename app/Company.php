<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Manager;

class Company extends Model
{

    protected $guarded = ['id'];

    public function files() {
        return $this->hasMany(File::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function groups() {
        return $this->hasMany(Group::class);
    }

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }

    public function updateCredit($amount) {
        $this->update([
            'credit' => $this->credit - $amount
        ]);
        return true;
    }

    public function scopeCurrentCompany($query) {
        return $query->findOrFail(app(Manager::class)->getTenant()->id);
    }
}
