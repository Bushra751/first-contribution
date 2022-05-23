<?php
require_once 'config.php';
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
  
try {
    $client = new Client(['base_uri' => 'https://www.linkedin.com']);
    $response = $client->request('POST', '/oauth/v2/accessToken', [
        'form_params' => [
                "grant_type" => "authorization_code",
                "code" => $_GET['code'],
                "redirect_uri" => REDIRECT_URL,
                "client_id" => CLIENT_ID,
                "client_secret" => CLIENT_SECRET,
        ],
    ]);
    $data = json_decode($response->getBody()->getContents(), true);
    $access_token = $data['AQXYzHB_i3QvrVqkHIp5qnXXZcMMpBK5yzKuPJuCGJfqMYlDhi6gMBFOED04arvKLH9svsNEBnAiDDr54Cy174CpjNOSllxDXJ9kGOfJElUz0KDRUfO-Z7J9S8U_gYzs0H9E9H4QZlLpxANA-qsInsfIX9HQjo-w0AUFvglhDQnWpA9FuMtYBEo93ciWJToqlvt2V5aLusngO04JRrozP2aSq75MNikzItatOyE_CzYcRn5fgnjZgaYZhm11HpGhj4-EC0GZGimVw1HF9uToCUVKowB0-XhsECD3R5STz0M3pkw-QKFHONSGG40RhiwRByycQ1sxVo-rEadzktuW8zEQmyfyZA']; // store this token somewhere
    echo $access_token;
} catch(Exception $e) {
    echo $e->getMessage();
}