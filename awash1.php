<?php

class Log
{
    public static function debug($str)
    {
        print "DEBUG: " . $str . "\n";
    }

    public static function info($str)
    {
        print "INFO: " . $str . "\n";
    }

    public static function error($str)
    {
        print "ERROR: " . $str . "\n";
    }
}

function Curl($url, $post_data, &$http_status, &$header = null)
{
    Log::debug("Curl $url JsonData=" . $post_data);

    $ch = curl_init();
    // user credencial
    //curl_setopt($ch, CURLOPT_USERPWD, "11233487:ZZi2HCH6Ku");
    //curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    // post_data
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    if (!is_null($header)) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }

    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization:' . base64_encode("44133736:R4P3JCYDOW")));

    curl_setopt($ch, CURLOPT_VERBOSE, true);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    Log::debug('Curl exec=' . $url);

    $body = null;
    // error
    if (!$response) {
        $body = curl_error($ch);
        // HostNotFound, No route to Host, etc  Network related error
        $http_status = -1;
        Log::error("CURL Error: = " . $body);
    } else {
        //parsing http status code
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (!is_null($header)) {
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
        } else {
            $body = $response;
        }
    }

    curl_close($ch);

    return $body;
}

$url = "http://197.156.96.28:8800/esbrestapi/validateOtp";

date_default_timezone_set('Africa/Addis_Ababa');
$timestamp = date_format(date_create(), "Y-m-d H:i:s");

$json = json_encode(
    array(
        "phone_Number" => "251911233487",
        "otp" => "5870"
    ));

//Log::debug("Curl $url JsonData=" . $json);

//Curl($url, $json, $http_status);
$ret = Curl($url, $json, $http_status);

var_dump($ret);