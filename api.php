<?php
declare(strict_types=1);

require_once 'CreateBook.php';
require_once 'ReadBook.php';
require_once 'UpdateBook.php';
require_once 'DeleteBook.php';


//wpadają wszystkie zapytania
$method = $_SERVER['REQUEST_METHOD'];

print_r($method." <br />".PHP_EOL);

//Sprawdzamy jaką metodą przyszło zapytanie
switch ($method) {
    case 'POST':
    // Stworzyć książkę
    // echo 'POST!',PHP_EOL;
    // $_POST;
    #$create = new CreateBook();
    #echo 'POST title: ',$_POST['title'];
    #$create->addBook((string) $_POST['title']);

    $data = json_decode(file_get_contents('php://input'),true);
    print_r($data);

    $create = new CreateBook();
    $return = $create->addBook($data['title']);
    echo(json_encode($return));



    break;
    
    case 'GET':   //localhost/api.php?id=1
    // Pobierać książki
    // echo 'GET!',PHP_EOL;
    // $_POST
    // print_r($_GET['id']);
    $read = new ReadBook($_GET['id']);
    // var_dump($read->get());

    if (isset($_GET['id'])) {
        $read->setId((int) $_GET['id']);
    } elseif (isset($_GET['title'])) {
        $read->setTitle($_GET['title']);
    } else {
        echo 'error';
        exit;
    }

    echo json_encode($read->get());
    break;

    case 'DELETE':
    // Usuwanie książki
    // echo 'DELETE!',PHP_EOL;
    // $_GET;
    $delete = new DeleteBook();

    if (isset($_GET['id'])) {
        $delete->delete((int) $_GET['id']);
    }

    if (isset($_GET['title'])) {
        $delete->deleteByTitle((string) $_GET['title']);
    }
    break;

    case 'PUT':
    // Aktualizować książki
    //SETery i GETery dla wszystkich pól w UpdateBook
    // echo 'PUT!',PHP_EOL;
    // $params = file_get_contents('php://input');  // adres tymczasowego pliku filenma: ',  virtual
    $params = json_decode(file_get_contents('php://input'), true);
    //$params('id'); $params('title'), ....
    print_r($params);
    $update = new UpdateBook();
    // Użycie SETerów

    echo '---------', $params['id'];
    
    $update->setId($params['id']);
    $update->setTitle($params['title']);
    $update->setAutor($params['autor']);
    $update->setIsbn($params['isbn']);
    $update->setPublisher($params['publisher']);
    $update->setPages($params['pages']);
    $update->setYear($params['year']);
    $update->setCover($params['cover']);
    $update->setCopies($params['copies']);
    $update->update2();
    break;

    default:
    echo 'Error!',PHP_EOL;
    break;
};
