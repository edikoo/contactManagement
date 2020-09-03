<?php


namespace App\Services;

use App\Notification;

class NotificationService
{
    public function createNotification($user, $text)
    {
        $Notification = new Notification;
        $Notification->notification_user = $user;
        $Notification->notification_text = $text;
        $Notification->save();
    }
}