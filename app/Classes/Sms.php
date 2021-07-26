<?php

namespace App\Classes;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class Sms
{
    
    public const PHONE_NUMBER = '+17752772710';

    public function twilioClient()
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];

        //return [$accountSid, $authToken];
        $client = new Client($accountSid, $authToken);
        
        return $client;
    }
}
