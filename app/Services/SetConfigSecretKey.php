<?php

namespace App\Services;

use App\Company;


class SetConfigSecretKey {

    /*
    $key company secret_key
    */
    public static function SetSecretKey($key) {
        config()->set('app.sodium', $key);
    }

}