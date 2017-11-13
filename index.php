<?php
require_once('./vendor/autoload.php');
// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
$channel_token = '9brpfcQU8dhCH4N0y5XTd+88lE3Klm5phX+lfwxc3YgYsGzv/8wSUTkIEinbEW5SF14drARdsS9yOjPoUuYUVwpN2aZUXmRvva4kTiiI1Eb2TiaDCJ5uK3CLZ1WVs500XVPig4dxafw63EpEc6YdGQdB04t89/1O/w1cDnyilFU=';
$channel_secret = 'fb7ba526f2921710462e999142ed88b2';
// Get message from Line API
$content = file_get_contents('php://input');
$events = json_decode($content, true);

//Test 13/11/17

if (!is_null($events['events'])) {
// Loop through each event
foreach ($events['events'] as $event) {
// Get replyToken
$replyToken = $event['replyToken'];
$ask = $event['message']['text'];
switch(strtolower($ask)) {
case 'm':
$respMessage = 'What sup man. Go away!';
break;
case 'f':
$respMessage = 'Love you lady.';
break;
default:
$respMessage = 'What is your sex? M or F'; 
break;
}
$httpClient

/*
if (!is_null($events['events'])) {
// Loop through each event
foreach ($events['events'] as $event) {
// Line API send a lot of event type, we interested in message only.
if ($event['type'] == 'message') {
  switch($event['message']['type']) {
case 'text':
// Get replyToken
$replyToken = $event['replyToken'];
// Reply message
$respMessage = 'Hello, your message is '. $event['message']['text'];
*/

$httpClient = new CurlHTTPClient($channel_token);
$bot = new LINEBot($httpClient, array('channelSecret' => $channel_secret));
$textMessageBuilder = new TextMessageBuilder($respMessage);
$response = $bot->replyMessage($replyToken, $textMessageBuilder);
break;
}
}
}
}
echo "OK";
