<?php

namespace common\components;

use GuzzleHttp\Client;

class FCMHelper
{
    const API_KEY = '************';

    public static function enviarNotificacionPush($notificacion, $to, $data = [], $toTipo = 'mult')
    {
        $client = new Client();

        $json = array();

        if (!empty($notificacion)) {
            $notificacion['click_action'] = 'FCM_PLUGIN_ACTIVITY';
            $json['notification'] = $notificacion;
        }

        switch ($toTipo) {
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