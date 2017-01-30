<?php
/* LINE */
$CHANNEL_SECRET = '85fccaff252454f5e7035093aa41e8c9';
$CHANNEL_ACCESS_TOKEN = 'Ze/06tcuQR1WyYCGYxZ2EoNN4qi0uVcHyV2gBrxi+FH4lzlR5vIM8PyUsiClj60L4stTEmRpFzeQds5/KXP0MJlPe4FYx8W4gylvFfwlpYEwwv5hSsTq1l1vHfXhYt16moS/2piTTTElodTg9ffGzwdB04t89/1O/w1cDnyilFU=';

/* TWITTER */
$CONSUMER_KEY = '';
$CONSUMER_SECRET = "";
$ACCESS_TOKEN = "";
$ACCESS_TOKEN_SECRET = "";

$json_input = file_get_contents('php://input');
$yows = new YOWS($CHANNEL_SECRET, $CHANNEL_ACCESS_TOKEN, $json_input);

echo $yows; 

