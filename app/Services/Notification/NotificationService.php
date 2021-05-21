<?php

namespace App\Services\Notification;

use Illuminate\Support\Facades\Http;

class NotificationService
{
    const NOTIFICATION = 'http://o4d9z.mocklab.io/notify';

    public function notification() 
    {
        $response = Http::get(self::NOTIFICATION);
        if($response->json()['message'] != 'Success') {
            return false;
        } 
        
        return true;
    }


}