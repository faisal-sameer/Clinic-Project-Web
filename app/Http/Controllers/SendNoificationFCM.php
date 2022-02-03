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
                "page_name" => $p_name,
                'NID' => '1098496366'
            )
        );

        $fields = json_encode($fields);

        $headers = array(

            'Authorization: key=' .  "AAAAgH1f1Is:APA91bFDpkXF_bMLFH3YLi4a1ZAe3dmwEQuI2ZofoWov5iSRmvd6WLmpLDTH1nFJO4BYrBId5r3OVZcmvIfjQvGpUZERGboHEFvH1-wVmhO7X3f5rBwZeS19YVtse_efRa9UJOZVRru7",
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
