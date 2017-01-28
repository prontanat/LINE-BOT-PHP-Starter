$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<channel access token>');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('<poprelates>', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();






<?php
$access_token = 'Ze/06tcuQR1WyYCGYxZ2EoNN4qi0uVcHyV2gBrxi+FH4lzlR5vIM8PyUsiClj60L4stTEmRpFzeQds5/KXP0MJlPe4FYx8W4gylvFfwlpYEwwv5hSsTq1l1vHfXhYt16moS/2piTTTElodTg9ffGzwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data

       $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
       $response = $bot->pushMessage('<poprelates>', $textMessageBuilder);
 
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
		}
	}
}
echo "OK";