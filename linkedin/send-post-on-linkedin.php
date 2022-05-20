<?php
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
  
$link = 'https://artisansweb.net/share-post-on-linkedin-using-linkedin-api-and-php';
$access_token = 'YOUR_ACCESS_TOKEN';
$linkedin_id = 'YOUR_LINKEDIN_ID';
$body = new \stdClass();
$body->content = new \stdClass();
$body->content->contentEntities[0] = new \stdClass();
$body->text = new \stdClass();
$body->content->contentEntities[0]->thumbnails[0] = new \stdClass();
$body->content->contentEntities[0]->entityLocation = $link;
$body->content->contentEntities[0]->thumbnails[0]->resolvedUrl = "https://i0.wp.com/artisansweb.net/wp-content/uploads/2019/04/linkedin-application.png?w=652&ssl=1";
$body->content->title = 'Share Post on LinkedIn Using LinkedIn API and PHP';
$body->owner = 'urn:li:person:'.$linkedin_id;
$body->text->text = 'If you are running a website then posting a link manually on LinkedIn is not a wise choice. It is always better to have an automated system that sends a post on your feed programmatically.';
$body_json = json_encode($body, true);
  
try {
    $client = new Client(['base_uri' => 'https://api.linkedin.com']);
    $response = $client->request('POST', '/v2/shares', [
        'headers' => [
            "Authorization" => "Bearer " . $access_token,
            "Content-Type"  => "application/json",
            "x-li-format"   => "json"
        ],
        'body' => $body_json,
    ]);
  
    if ($response->getStatusCode() !== 201) {
        echo 'Error: '. $response->getLastBody()->errors[0]->message;
    }
  
    echo 'Post is shared on LinkedIn successfully.';
} catch(Exception $e) {
    echo $e->getMessage(). ' for link '. $link;
}