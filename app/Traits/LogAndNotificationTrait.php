<?php
namespace App\Traits;

use App\Log;
use App\Notification;

trait LogAndNotificationTrait
{
    public function createLog($text) : void
    {
        $Log = new Log;
        $Log->name = $text;
        $Log->save();
    }

    public function createNotification($user, $text) : void
    {
        $Notification = new Notification;
        $Notification->notification_user = $user;
        $Notification->notification_text = $text;
        $Notification->save();
    }

}