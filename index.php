<?php
// create curl resource
$ch = curl_init();   // przygotowujemy obiekt
$mysqli= new mysqli('127.0.0.1', 'root','','bookstore');
var_dump($mysqli->connect_error);
$mysqli->query(
    'INSERT INTO books
    (`id`, `title`, `autor`, `isbn`, `publisher`, `pages`, `year`, `cover`, `copies`)
    VALUES (NULL, "TEST", "Autor", "9992158107", "wydawca", 100, 2017, "hard", 32)'
);


exit;

curl_setopt($ch, CURLOPT_ACCEPT_ENCODING, 'gzip');

//curl_setopt($ch, CURLOPT_TIMEOUT_MS, 3000);

// set url
curl_setopt($ch, CURLOPT_URL, "https://wp.pl");

//
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

var_dump(curl_exec($ch));
curl_close($ch);


exit;

