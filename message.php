<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$postdata=array("model"=> "text-davinci-001",
"prompt"=> $_POST['text'],
"temperature"=> 0.4,
"max_tokens"=> 1400,
"top_p"=> 1,
"frequency_penalty"=> 0,
"presence_penalty"=> 0);
$postdata=json_encode($postdata);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer your_key_here';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
$result=json_decode ($result, true);
 echo $result['choices'][0]['text'];

?>