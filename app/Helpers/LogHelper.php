<?php

namespace App\Helpers;

use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class LogHelper
{

    public static function logActivity($activity, $description, $userId = null)
    {
        $log = new Log();
        $log->activity = $activity;
        $log->description = $description;
        $log->user_id = $userId ?? auth()->id(); // Ambil user id jika ada, atau gunakan id yang sedang login
        $log->logged_at = now();
        $log->save();
    }

    // Log untuk info ke dalam database
    public static function logInfo($message, $userId = null)
    {
        self::logActivity('INFO', $message, $userId);
    }

    // Log untuk warning ke dalam database
    public static function logWarning($message, $userId = null)
    {
        self::logActivity('WARNING', $message, $userId);
    }

    // Log untuk error ke dalam database
    public static function logError($message, $userId = null)
    {
        self::logActivity('ERROR', $message, $userId);
    }

    // Log untuk debug ke dalam database
    public static function logDebug($message, $userId = null)
    {
        self::logActivity('DEBUG', $message, $userId);
    }
}
