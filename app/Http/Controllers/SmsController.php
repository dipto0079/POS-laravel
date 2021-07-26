<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class SmsController extends Controller
{
    public function sendSms()
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];

        //return [$accountSid, $authToken];
        $client = new Client($accountSid, $authToken);
        try
        {
            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
            // the number you'd like to send the message to
                '+8801521493732',
                array(
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => '+17752772710',
                    // the body of the text message you'd like to send
                    'body' => 'Hey Shuvo! It’s good to see you after long time!'
                )
            );
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}
