<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;


class SodiumEncrypter extends Facade {


    protected static function getFacadeAccessor() { return 'sodiumencrypter'; }

}