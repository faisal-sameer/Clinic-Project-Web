<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendNoificationFCM extends Controller
{

    function    sendGCM($title, $message, $fcm_id, $p_id, $p_name)
    {

        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
            'registration_ids' => array(
                $fcm_id
            ),
            'priority' => 'high',
            'content_available' => true,

            'notification' => array(
                "title" => $title,
                "body" => $message,
                "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                "sound" => "default",

                "isScheduled" => "true",
            ),
            'data' => array(
                "page_id" => $p_id,
                "page_name" => $p_name
            )
        );

        $fields = json_encode($fields);

        $headers = array(

            'Authorization: key=' .  "AAAAgH1f1Is:APA91bG3Hja39tZcfolV5_XObOrSH7MiatHQSmQLwwhazkobB1Q6RZDvIycTQ2r916ejC6-yRI_KKka-DlO287C6QGl1BbGtFvHMxb8vEM7l30Gczio9IOgV8KvUt-1rkDSKFZfQ7eXh",
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        $result = curl_exec($ch);

        return $result;
        curl_close($ch);
    }
}
