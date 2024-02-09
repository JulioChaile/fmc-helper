<?php

namespace common\components;

use GuzzleHttp\Client;

class FCMHelper
{
    const API_KEY = '************';

    /**
     * Sends a push notification using Firebase Cloud Messaging (FCM).
     *
     * @param array $notification Notification data.
     * @param string|array $to Recipient(s) of the notification.
     * @param array $data Additional data to send with the notification.
     * @param string $toType Type of recipient: 'mult' (multiple devices), 'topic' (topic), 'user' (specific user).
     * @return array Response from FCM server.
     */
    public static function sendPushNotification($notification, $to, $data = [], $toType = 'mult')
    {
        $client = new Client();

        $json = array();

        if (!empty($notification)) {
            $notification['click_action'] = 'FCM_PLUGIN_ACTIVITY';
            $json['notification'] = $notification;
        }

        switch ($toType) {
            case 'mult':
                $json['registration_ids'] = $to;
                break;

            case 'topic':
                $json['to'] = "/topics/" . $to;
                break;

            case 'user':
                $json['to'] = $to;
                break;
        }

        if (!empty($data)) {
            $json['data'] = $data;
        }

        $response = $client->request('POST', 'https://fcm.googleapis.com/fcm/send', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'key=' . FCMHelper::API_KEY
            ],
            'json' => $json
        ]);

        return json_decode($response->getBody(), true);
    }
}