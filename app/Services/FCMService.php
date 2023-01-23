<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FCMService
{ 
    public static function send($ids, $notification)
    {
        $client = new \GuzzleHttp\Client();
        $lisOfIds=implode(", ", $ids);
        $response = $client->request('POST', 'https://onesignal.com/api/v1/notifications', [
        'body' => '{"include_external_user_ids":
            ['.$lisOfIds.'],
            "contents":
            {"en":'.$notification.',"es":"Spanish Message"},
            "name":"INTERNAL_CAMPAIGN_NAME","app_id":"dd2bc71c-72f2-4018-9e24-02039015dabf"}',
        'headers' => [
            'Authorization' => 'Basic YmM4Y2UxZjYtYmMwOC00MzE2LWE0NjgtODRiNDU4MjBlY2Q2',
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ],
        ]);
    }
}