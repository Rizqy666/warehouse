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
        $log->user_id = $userId ?? auth()->id();
        $log->logged_at = now();
        $log->save();
    }
}
