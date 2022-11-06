<?php

namespace App\Composers;

use App\Models\Notification;
use Carbon\Carbon;

class NotificationComposer
{
    public function compose($view)
    {
        $notifications = Notification::where("display_from", "<=", Carbon::now())
                                        ->where("display_to", ">=", Carbon::now())
                                        ->get();
        $view->with('notifications', $notifications);
    }
}
