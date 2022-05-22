<?php
require_once 'config.php';
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
  
$access_token = 'AQXYzHB_i3QvrVqkHIp5qnXXZcMMpBK5yzKuPJuCGJfqMYlDhi6gMBFOED04arvKLH9svsNEBnAiDDr54Cy174CpjNOSllxDXJ9kGOfJElUz0KDRUfO-Z7J9S8U_gYzs0H9E9H4QZlLpxANA-qsInsfIX9HQjo-w0AUFvglhDQnWpA9FuMtYBEo93ciWJToqlvt2V5aLusngO04JRrozP2aSq75MNikzItatOyE_CzYcRn5fgnjZgaYZhm11HpGhj4-EC0GZGimVw1HF9uToCUVKowB0-XhsECD3R5STz0M3pkw-QKFHONSGG40RhiwRByycQ1sxVo-rEadzktuW8zEQmyfyZA';
try {
    $client = new Client(['base_uri' => 'https://api.linkedin.com']);
    $response = $client->request('GET', '/v2/me', [
        'headers' => [
            "Authorization" => "Bearer " . $access_token,
        ],
    ]);
    $data = json_decode($response->getBody()->getContents(), true);
    $linkedin_profile_id = $data['id']; // store this id somewhere
    echo $linkedin_profile_id;
} catch(Exception $e) {
    echo $e->getMessage();
}