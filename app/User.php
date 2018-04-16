<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

use Spatie\Permission\Traits\HasRoles;

use App\Tenant\Manager;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'activation_token', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ByttPassord($token));
    }

    public function companies() {
        return $this->belongsToMany(Company::class)->withTimestamps();
    }

    public function groups() {
        return $this->belongsToMany(Group::class);
    }

    public function tokens() {
        return $this->hasOne(Token::class);
    }

    public function scopeCompanyUsers($query) {
        return $query->whereHas('companies', function ($query) {
            $query->where('id', app(Manager::class)->getTenant()->id);
        });
    }


}

class ByttPassord extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Du mottar denne e-posten siden du har bedt om å få laget nytt passord på kontoen din.')
            ->action('Lag nytt passord', url(config('app.url') . route('password.reset', $this->token, false)))
            ->line('Ikke bedt om nytt passord? Vennligst ta kontakt med oss gjennom kontaktskjemaet på nettsiden vår.');
    }
}