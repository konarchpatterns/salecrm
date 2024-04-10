<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UseZoom;
use App\Models\Appointment;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use App\Library\Zoom_Api;
class ZoomController extends Controller
{

    public function auth_token()
{
    $client = new Client();

    //====== get Auth token =======
    $response = $client->post('https://zoom.us/oauth/token', [
        'form_params' => [
            'grant_type' => 'account_credentials',
            'account_id' => env('ZOOM_ACCOUNT_ID'),
            'client_id' => env('ZOOM_API_KEY'),
            'client_secret' => env('ZOOM_API_SECRET'),
        ],
    ]);
    $accessToken = json_decode($response->getBody())?->access_token ;

    return $accessToken;
}


public function create_meeting()
{


        $zoomUserId = 'me';
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $requestBody = [
            'topic'      => 'krushil demo',
            'type'       =>  2,
            'start_time' => date('Y-m-dTh:i:00') . 'Z',
            'duration'   =>  30,
            'password'   =>  mt_rand(),
            'timezone'   => 'Asia/Kolkata',
            'agenda'     =>  'Interview Meeting',
            'settings'   => [
                'host_video'        => false,
                'participant_video' => true,
                'cn_meeting'        => false,
                'in_meeting'        => false,
                'join_before_host'  => true,
                'mute_upon_entry'   => true,
                'watermark'         => false,
                'use_pmi'           => false,
                'approval_type'     => 1,
                'registration_type' => 1,
                'audio'             => 'voip',
                'auto_recording'    => 'none',
                'waiting_room'      => false,
            ],
        ];
        //++++++++++++++++++++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Skip SSL Verification
        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.zoom.us/v2/users/" . $zoomUserId . "/meetings",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => json_encode($requestBody),
            CURLOPT_HTTPHEADER     => array(
                "Authorization: Bearer " . $this->auth_token(),
                "Content-Type: application/json",
                "cache-control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err      = curl_error($curl);
        curl_close($curl);
        //++++++++++++++++++++++++++++++++++++++++++++++++
        if ($err) {
            return [
                'success'  => false,
                'msg'      => 'cURL Error #:' . $err,
                'response' => null,
            ];
        } else {
            return [
                'success'  => true,
                'msg'      => 'success',
                'response' => json_decode($response, true),
            ];
        }





}



public function update_meeting()
{


       // $zoomUserId = 'me';
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $requestBody = [
            'topic'      => 'krushil ka naya video lik hua',
            'type'       =>  2
        ];
        //++++++++++++++++++++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $curl = curl_init();
        $zoomUserId=99181449068;
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Skip SSL Verification
        curl_setopt_array($curl, array(

            CURLOPT_URL            => "https://api.zoom.us/v2/meetings/" . $zoomUserId . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => "",
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => "PATCH",
            CURLOPT_POSTFIELDS     => json_encode($requestBody),
            CURLOPT_HTTPHEADER     => array(
                "Authorization: Bearer " . $this->auth_token(),
                "Content-Type: application/json",
                "cache-control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err      = curl_error($curl);
        curl_close($curl);
        //++++++++++++++++++++++++++++++++++++++++++++++++
        if ($err) {
            return [
                'success'  => false,
                'msg'      => 'cURL Error #:' . $err,
                'response' => null,
            ];
        } else {
            return [
                'success'  => true,
                'msg'      => 'success',
                'response' => json_decode($response, true),
            ];
        }





}




function list_meetings($next_page_token = '') {
    $zoomUserId = 'me';
    //++++++++++++++++++++++++++++++++++++++++++++++++

    //++++++++++++++++++++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++++++++++++++++++++
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Skip SSL Verification
    curl_setopt_array($curl, array(
        CURLOPT_URL            => "https://api.zoom.us/v2/users/me/meetings",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => "GET",
        CURLOPT_HTTPHEADER     => array(
            "Authorization: Bearer " . $this->auth_token(),
            "Content-Type: application/json",
            "cache-control: no-cache",
        ),
    ));
      $data = json_decode(curl_exec($curl));
    $err      = curl_error($curl);
    curl_close($curl);
 //   $data = json_decode($response->getBody());

    //++++++++++++++++++++++++++++++++++++++++++++++++
    if ( !empty($data) ) {
        foreach ( $data->meetings as $d ) {
            $topic = $d->topic;
            $join_url = $d->join_url;
            echo "<h3>Topic: $topic</h3>";
            echo "Join URL: $join_url";
        }

        if ( !empty($data->next_page_token) ) {
            list_meetings($data->next_page_token);
        }




}


}


}
