<?php
declare(strict_types=1);

require_once 'CreateBook.php';
require_once 'ReadBook.php';
require_once 'UpdateBook.php';
require_once 'DeleteBook.php';


//wpadają wszystkie zapytania
$method = $_SERVER['REQUEST_METHOD'];

//print_r($method);
//echo PHP_EOL;

//Sprawdzamy jaką metodą przyszło zapytanie
switch ($method) {
    case 'POST':
    // Stworzyć książkę
    // echo 'POST!',PHP_EOL;
    // $_POST;
    $create = new CreateBook();
    break;
    
    case 'GET':   //localhost/api.php?id=1
    // Pobierać książki
    // echo 'GET!',PHP_EOL;
    // $_POST
    // print_r($_GET['id']);
    $read = new ReadBook($_GET['id']);
    var_dump($read->get());


    if (isset($_GET['id'])) {
        $read->setId($_GET['id']);
    } elseif (isset($_GET['title'])) {
        $read->setTitle($_GET['title']);
    } else {
        echo 'error';
        exit;
    }
    echo $read->get();
    
    /*
    $read = new ReadBook();
    if (isset($_GET['id'])) {
        $read->setId($_GET['id']);
    } elseif (isset($_GET['title'])) {
        $read->setTitle($_GET['title']);
    } else {
        echo 'error';
        exit;
    }
    echo $read->get();
   */

    break;

    case 'DELETE':
    // Usuwanie książki
    // echo 'DELETE!',PHP_EOL;
    // $_GET;
    $delete = new DeleteBook();

    break;

    case 'PUT':
    // Aktualizować książki
    // echo 'PUT!',PHP_EOL;
    $params = file_get_contents('php://input');  // adres tymczasowego pliku,  virtual
    $update = new UpdateBook();
    break;

    default:
    echo 'Error!',PHP_EOL;
    break;
};



