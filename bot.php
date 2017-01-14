<?php
$access_token = 'Ze/06tcuQR1WyYCGYxZ2EoNN4qi0uVcHyV2gBrxi+FH4lzlR5vIM8PyUsiClj60L4stTEmRpFzeQds5/KXP0MJlPe4FYx8W4gylvFfwlpYEwwv5hSsTq1l1vHfXhYt16moS/2piTTTElodTg9ffGzwdB04t89/1O/w1cDnyilFU=';

namespace LINE\Tests\LINEBot;
use LINE\LINEBot;
use LINE\LINEBot\Constant\MessageType;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\Tests\LINEBot\Util\DummyHttpClient;
class SendImageTest extends \PHPUnit_Framework_TestCase
{
    public function testReplyImage()
    {
        $mock = function ($testRunner, $httpMethod, $url, $data) {
            /** @var \PHPUnit_Framework_TestCase $testRunner */
            $testRunner->assertEquals('POST', $httpMethod);
            $testRunner->assertEquals('https://api.line.me/v2/bot/message/reply', $url);
            $testRunner->assertEquals('REPLY-TOKEN', $data[$access_token]);
            $testRunner->assertEquals(1, count($data['messages']));
            $testRunner->assertEquals(MessageType::IMAGE, $data['messages'][0]['type']);
            $testRunner->assertEquals('https://image.winudf.com/45/31a37a10b29410/screen-2.jpg', $data['messages'][0]['originalContentUrl']);
            $testRunner->assertEquals('https://image.winudf.com/45/31a37a10b29410/screen-2.jpg', $data['messages'][0]['previewImageUrl']);
            return ['status' => 200];
        };
        $bot = new LINEBot(new DummyHttpClient($this, $mock), ['channelSecret' => 'CHANNEL-SECRET']);
        $res = $bot->replyMessage(
            'REPLY-TOKEN',
            new ImageMessageBuilder('https://example.com/image.jpg', 'https://example.com/image_preview.jpg')
        );
        $this->assertEquals(200, $res->getHTTPStatus());
        $this->assertTrue($res->isSucceeded());
        $this->assertEquals(200, $res->getJSONDecodedBody()['status']);
    }
    public function testPushImage()
    {
        $mock = function ($testRunner, $httpMethod, $url, $data) {
            /** @var \PHPUnit_Framework_TestCase $testRunner */
            $testRunner->assertEquals('POST', $httpMethod);
            $testRunner->assertEquals('https://api.line.me/v2/bot/message/push', $url);
            $testRunner->assertEquals('DESTINATION', $data['to']);
            $testRunner->assertEquals(1, count($data['messages']));
            $testRunner->assertEquals(MessageType::IMAGE, $data['messages'][0]['type']);
            $testRunner->assertEquals('https://example.com/image.jpg', $data['messages'][0]['originalContentUrl']);
            $testRunner->assertEquals('https://example.com/image_preview.jpg', $data['messages'][0]['previewImageUrl']);
            return ['status' => 200];
        };
        $bot = new LINEBot(new DummyHttpClient($this, $mock), ['channelSecret' => 'CHANNEL-SECRET']);
        $res = $bot->pushMessage(
            'DESTINATION',
            new ImageMessageBuilder('https://example.com/image.jpg', 'https://example.com/image_preview.jpg')
        );
        $this->assertEquals(200, $res->getHTTPStatus());
        $this->assertTrue($res->isSucceeded());
        $this->assertEquals(200, $res->getJSONDecodedBody()['status']);
    }
}