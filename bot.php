<?php
$access_token = 'WQ3C3Xhhn/pc4s0NTsDDn9SDDfTFpWeTwsWkhq8ZjBUC6FbBDWrDU8NK//T46jVghyOf3e+hOC5QiKpHB0ILiFvanayNcqH6R/h+tMuPcVRJyUQue0Fp159BBifp1E7wNyjX7c4+Rj3i9jPPdU3fiwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
			$text = $event['message']['text'];
			$userid = $event['source']['userId'];
			$groupId = $event['source']['groupId'];
			if($text == 'sticker'){
			$messages = [
			  'type' => 'sticker',
			  'packageId' => '1',
			  'stickerId' => '1',
			];
			
			$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' => $groupId,
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
		else if($text == 'picture'){
			$messages = [
			  'type' => 'image',
				'originalContentUrl' => 'https://raw.githubusercontent.com/kittinan/Sample-Line-Bot/master/images/beer.jpg',
				'previewImageUrl' => 'https://raw.githubusercontent.com/kittinan/Sample-Line-Bot/master/images/beer_preview.jpg',
			];
			
			$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' => $groupId,
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
		else if($text == 'roomid'){
			$messages = [
			  'type' => 'text',
			  'text' => $groupId,
			];
			
			$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' => $groupId,
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
		else if($text == 'video'){
			$messages = [
				'type' => 'video',
				'originalContentUrl' => 'https://github.com/prontanat/LINE-BOT-PHP-Starter/blob/master/Banana_Song_-_Reverse_Version_-_YouTube.mp4',
				'previewImageUrl' => 'https://raw.githubusercontent.com/kittinan/Sample-Line-Bot/master/images/beer_preview.jpg',
			];
			
			$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' => $groupId,
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
	}
}
echo "OK";