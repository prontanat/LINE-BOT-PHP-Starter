<?php
$access_token = 'Ze/06tcuQR1WyYCGYxZ2EoNN4qi0uVcHyV2gBrxi+FH4lzlR5vIM8PyUsiClj60L4stTEmRpFzeQds5/KXP0MJlPe4FYx8W4gylvFfwlpYEwwv5hSsTq1l1vHfXhYt16moS/2piTTTElodTg9ffGzwdB04t89/1O/w1cDnyilFU=';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '85fccaff252454f5e7035093aa41e8c9']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('<to>', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
echo "OK";