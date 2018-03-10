<?php
declare(strict_types=1);

$data = [
"title" => "Hagrid",
"autor" => "Harry Potter",
"year" => 1990
];

$dataEncoded = json_encode($data);
//$data = array("name" => "Hagrid", "age" => "36");
//$data_string = json_encode($data);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

$ch = curl_init('http://localhost/test/api.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataEncoded);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: text/plain',
'Content-Length: ' . strlen($dataEncoded),
'Content-Type: application/json'
));
$result = curl_exec($ch);
var_dump($result);