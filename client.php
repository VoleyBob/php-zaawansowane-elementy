<?php
declare(strict_types=1);

//GET
//$data = array("name" => "Hagrid", "age" => "36");
//$data_string = json_encode($data);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

#$ch = curl_init('http://localhost/test/api.php?id=1');

$url = 'http://localhost/test/api.php'; //Tu dajecie URL do Waszego API

/*
//GET - pobieramy dane o książkach
$ch = curl_init($url . '?id=1'); //Zapytanie o książkę o id = 1


// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept' => 'application/json'
));
$result = curl_exec($ch);
var_dump($result);


echo "<br />", PHP_EOL;
echo "-------------", "<br />", PHP_EOL;
echo "<br />", PHP_EOL;
*/


//POST  oldies but goldies
#$data = json_encode(array("title" => "Hagrid", "year" => 1990));
#$ch = curl_init('http://localhost/test/api.php');
#curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
#curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
#curl_setopt($ch, CURLOPT_HTTPHEADER, array(
##    'Content-Type' => 'application/json',
#    'Content-Length' => strlen($data),
#    'Accept' => 'text/plain'));
#$result = curl_exec($ch);
#var_dump($result);

// //POST - wysyłamy tytuł nowej ksiażki, która ma zostać dodana
// $ch = curl_init($url);
// $data = json_encode(array("title" => "Hagrid"));
// $ch = curl_init($url);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  //POST lub PUT lub DELETE
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json',
//         'Content-Length: ' . strlen($data),
//         'Accept: application/json, text/html, text/plain'
// ));
// $result = curl_exec($ch); //W dopowiedzi musicie dostać ID utworzonej książki
// var_dump($result);


//POST - wysyłamy tytuł nowej ksiażki, która ma zostać dodana
$ch = curl_init($url);
$data = json_encode(array(
    'id' => '425',
    'title' => 'nowyT',
    'autor' => 'nowyA',
    'isbn' => '1234561234567',
    'publisher' => 'nowyP',
    'pages' => 'nowyPg',
    'year' => '1987',
    'cover' => 'soft',
    'copies' => '18'
));
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");  //POST lub PUT lub DELETE
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data),
        'Accept: application/json, text/html, text/plain'
));
$result = curl_exec($ch); //W dopowiedzi musicie dostać ID utworzonej książki
var_dump($result);

//$data_string = json_encode($data);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);


