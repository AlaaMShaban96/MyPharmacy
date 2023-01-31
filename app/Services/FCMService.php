<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FCMService
{ 
    public static function send($ids, $notification)
    {
        $lisOfIds=implode(", ", $ids);
        $client = new \GuzzleHttp\Client();
        $body=[
            "include_external_user_ids"=>$ids,
            "channel_for_external_user_ids"=>"push",
            "isAndroid"=>"true",
            "contents"=>[
                "en"=>$notification,
            ],
            "name"=>"INTERNAL_CAMPAIGN_NAME",
            "app_id"=>"dd2bc71c-72f2-4018-9e24-02039015dabf"
        ];
        $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications',
         [
            'body' =>json_encode($body),
            'headers' => [
                'Authorization' => 'Basic YmM4Y2UxZjYtYmMwOC00MzE2LWE0NjgtODRiNDU4MjBlY2Q2',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);
    }
}