<?php

namespace App\Http\Controllers;

use Cloudinary\Transformation\Y;
use DateTime;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;

class FileApiController extends Controller
{
    public static function uploadfile($filePath)
    {
        $ch = curl_init();

        $url = 'https://api.cloudinary.com/v1_1/dlz48jkf6/image/upload';
        $apiKey = '297985112759413';
        $apiSecret = 'aRMFVyP7EcH86wUevzQhsJDkHTs';

        $timestamp = strtotime(date('Y-m-d H:i:s'));
      

        $data = array(
            'file' => $filePath,
            'timestamp' => $timestamp,
            'api_key' => $apiKey,
        );
        $signature = sha1(implode("&", $data) . $apiSecret);
        $data['signature'] = $signature;

        $fileUrl = $filePath;

        // Serialized sorted parameters in a single string
        $stringToSign = http_build_query($data);

        // String including the API secret that is used to create the SHA-1 signature
        $stringToSignWithSecret = $stringToSign . $apiSecret;

        // SHA-1 hexadecimal result
        $signature = sha1($stringToSignWithSecret);

        // Now you can use these values in your API request
        $data = array(
            'timestamp' => $timestamp,
            'api_key' => $apiKey,
            'file' => $fileUrl,
            'signature' => $signature,
        );

        // Make your API request using $requestParameters




        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'),
        ));

        $result = curl_exec($ch);

        dd($result);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }

        curl_close($ch);

        return 1;
    }
}
