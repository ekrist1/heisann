<?php

namespace App\Services;

use App\Stat;

class LogToStat
{
    public static function logUsage($type)
    {
        $stat = Stat::create([
            'user_id' => auth()->user()->id,
            'type' => $type
        ]);

        return true;
    }
}