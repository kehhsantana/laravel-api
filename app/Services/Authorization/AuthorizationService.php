<?php

namespace App\Services\Authorization;

use Illuminate\Support\Facades\Http;

class AuthorizationService
{
    const AUTHORIZATION = 'https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6';

    public function authorization() 
    {
        $response = Http::get(self::AUTHORIZATION);
        if($response->json()['message'] != 'Autorizado') {
            return false;
        } 

        return true;
    }


}