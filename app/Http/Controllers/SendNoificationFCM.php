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
                //  $fcm_id
                'e4ZDlld5Sdy38WfCROHoI2:APA91bGLQ0UTIfIloqxQ9R5PxmN9w-EolRXwJfkKqwjiXH6dOdrtq-GwBp8HweYvShWcy4zxco1rxm4PcYjRyf527yftMrgZaZj2RSJXpV-ugXDc278jqjIIfzX0V_QZ7rELBVLL894U'
            ),
            'priority' => 'high',
            'content_available' => true,

            'notification' => array(
                "title" => $title,
                "body" => $message,
                "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                "sound" => "default",
                "isScheduled" => "true",
                'image' => 'https://64.media.tumblr.com/d7f179c91cc199df70ea54eb2c13611a/accf1cf5e999f007-43/s1280x1920/d962c133414dd08e2a6b07aa22f06c439137c50a.jpg'

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
