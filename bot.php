<?php
$access_token = 'Ze/06tcuQR1WyYCGYxZ2EoNN4qi0uVcHyV2gBrxi+FH4lzlR5vIM8PyUsiClj60L4stTEmRpFzeQds5/KXP0MJlPe4FYx8W4gylvFfwlpYEwwv5hSsTq1l1vHfXhYt16moS/2piTTTElodTg9ffGzwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		//if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
	
			// Build message to reply back
			if($text == '22'){

		     $messages = [
				'type' => 'image',
				'image' => 'http://teen.mthai.com/app/uploads/2016/01/Children-Day-520x245.jpg'
			];
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				 new ImageMessageBuilder('http://teen.mthai.com/app/uploads/2016/01/Children-Day-520x245.jpg', 'http://teen.mthai.com/app/uploads/2016/01/Children-Day-520x245.jpg')
			];
			$post = json_encode($data);
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
			else{
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
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

			// Make a POST Request to Messaging API to reply to sender
			
		//}
	}
}
echo "OK";