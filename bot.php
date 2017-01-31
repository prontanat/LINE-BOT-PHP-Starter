<? php 
  // Set the account information. 
  // LINE developers site of Channels> in Basic information 
  allows you to configure the information that has been // described. 
  $ ChannelId  = "1496607604"; // Channel ID 
  $ ChannelSecret  = "85fccaff252454f5e7035093aa41e8c9"; // Channel Secret 
  $ Mid  = "u1dc80e85608022822552f9b2b9a1cc2c"; // MID

  // Get the message (body part of POST request) sent from LINE. 
  // The following JSON formatted character string will be sent. 
  {// "Result": [ 
  // { 
  // · · · 
  // "Content": { 
  // "contentType": 1, 
  // "From": "Uff2aec188e58752ee1fb0f9507c6529a", 
  // "Text": "Hello, ! BOT API Server " 
  // · · · 
  //} 
  //}, 
  // · · · 
  //]} 
  $ RequestBodyString  =  file_get_contents ( ' Php: // Input ' ) ;
   $ RequestBodyObject  = Json_decode ( $ RequestBodyString ) ;
   $ RequestContent  =  $ RequestBodyObject -> Result { 0 } -> Content ;
   $ RequestText  =  $ RequestContent -> text; // text has been transmitted from the user 
  $ RequestFrom  =  $ RequestContent -> from; // send user of the MID 
  $ contentType  =  $ RequestContent -> contentType; // data type (1 text)

  // LINE header of the request to the API BOT 
  $ Headers  =  Array ( 
    " Content-Type: Application / json; Charset = UTF-8 ",
    " X-Line-ChannelID: { $ channelId } ", // Channel ID 
    " X-Line-ChannelSecret: { $ ChannelSecret } ", // Channel Secret 
    " X-Line-Trusted-User-With-ACL: { $ Mid } ", // MID 
  ) ;

  // Text to return to the user. 
  / / I definitely recommend boiling pot of Umakoshi. 
  $ ResponseText  =  <<< EOM
" { $ RequestText } It is". understood. In such a case, Umamoto noodle of Yamagoshi. Http : //Yamagoeudon.Com
EOM;

  // Create JSON data that will be passed to the user via the LINE BOT API. 
  // to designate the MID of the response destination user in the form of an array. 
  // toChannel, eventType specifies a fixed numeric value / character string. 
  // contentType is 1 if returning text. 
  // toType is 1 in case of a response to the user. 
  // text specifies the text to return to the user. 
  $ ResponseMessage  =  <<< EOM
     { 
      " To " : [ " { $ RequestFrom } " ] ,
      " ToChannel " : 1383378250 ,
      " EventType " : " 138311608800106203 ",
      " Content " : { 
        " contentType " : 1 ,
        " ToType " : 1 ,
        " Text " : " { $ responseText } "
       } 
    }
EOM;

  // LINE create and run a request to the API BOT 
  $ Curl  =  curl_init ( ' Https://Trialbot-api.Line.Me/v1/events ' ) ;
   curl_setopt ( $ Curl , CURLOPT_POST, True ) ;
   curl_setopt ( $ Curl , CURLOPT_HTTPHEADER, $ Headers ) ;
   curl_setopt ( $ Curl , CURLOPT_POSTFIELDS, $ ResponseMessage ) ;
   curl_setopt ( $ Curl , CURLOPT_RETURNTRANSFER, True ) ;
   specify a proxy URL of Fixie of // Heroku Addon. Details are described below. 
  curl_setopt ( $ Curl , CURLOPT_HTTPPROXYTUNNEL, 1 ) ;
   curl_setopt ( $ Curl , CURLOPT_PROXY, getenv ( ' FIXIE_URL ' )) ;
   $ Output  =  Curl_exec ( $ Curl ) ;
 ?>