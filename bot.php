<?php
$access_token = 'Ze/06tcuQR1WyYCGYxZ2EoNN4qi0uVcHyV2gBrxi+FH4lzlR5vIM8PyUsiClj60L4stTEmRpFzeQds5/KXP0MJlPe4FYx8W4gylvFfwlpYEwwv5hSsTq1l1vHfXhYt16moS/2piTTTElodTg9ffGzwdB04t89/1O/w1cDnyilFU=';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('1496607604');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'u1dc80e85608022822552f9b2b9a1cc2c']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('poprelates', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
