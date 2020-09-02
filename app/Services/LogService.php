<?php


namespace App\Services;

use App\Log;

class LogService
{
    public function createLog($log)
    {
        $Log = new Log;
        $Log->name = $log;
        $Log->save();
    }
}