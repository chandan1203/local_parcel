<?php

namespace App\Services;


class SmsService
{

    public static $endpoint = 'http://bulksms.m2mbd.net/smsapi';
    public static $api_key = 'C20028415c1f1afcd61ca0.08017082';
    //public static $senderid = '8801847169884'; // NON Masking
    public static $senderid = 'Airposted'; // Masking


    public static $errors = [
        "1002"    => "Sender Id/Masking Not Found",
        "1003"    => "API Not Found",
        "1004"    => "SPAM Detected",
        "1005"    => "Internal Error",
        "1006"    => "Internal Error",
        "1007"    => "Balance Insufficient",
        "1008"    => "Message is empty",
        "1009"    => "Message Type Not Set (text/unicode)",
        "1010"    => "Invalid User & Password",
        "1011"    => "Invalid User Id",
        "1012"    => "Invalid Number",
    ];

    public static function send($number, $body)
    {

        if (is_array($number)) {
            $number = implode('', $number);
        }

       
        $params = array(
            "api_key" => self::$api_key,
            "type" => "text",
            "contacts" => self::getValidPhoneCode($number),
            "senderid" => self::$senderid,
            "msg" => rawurlencode($body)
        );


        $request_url = self::genarate_url($params);

        $obj = self::curl($request_url, 'obj');

        return [
            'success' => true,
            'response' => $obj
        ];

        return $obj;
    }


    public static function genarate_url($params)
    {
        // Sort the parameters by key
        ksort($params);

        $pairs = array();

        foreach ($params as $key => $value) {
            // array_push($pairs, rawurlencode($key)."=".rawurlencode($value));
            array_push($pairs, $key . "=" . $value);
        }

        // Generate the canonical query
        $canonical_query_string = join("&", $pairs);

        // Generate the signed URL
        $request_url = self::$endpoint . '?' . $canonical_query_string;
        return $request_url;
    }

    public static function curl($url, $output_type = 'obj')
    {
        $handle = curl_init();
        // Set the url
        curl_setopt($handle, CURLOPT_URL, $url);
        // Set the result output to be a string.+
        curl_setopt($handle, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($handle);
        $err = curl_error($handle);  //if you need
        if ($err) {
            die($err);
        }
        curl_close($handle);

        // dd($output);

        // $xml = simplexml_load_string($output);

        // if($output_type == 'json'){
        // 	return json_encode($xml);
        // } elseif($output_type == 'obj'){
        // 	$json = json_encode($xml);
        // 	return json_decode($json);
        // }


        return $output;
    }

    public static function getValidPhoneCode($number)
    {
        $code = "+88";
        $phone = $code . $number;
        return $phone;
    }
}
