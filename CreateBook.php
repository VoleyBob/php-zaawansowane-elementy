<?php
declare(strict_types=1);

require_once 'Base.php';

class CreateBook extends Base
{
    public function validate() 
    {
         // escape'uje wszystkie {"}  i {'} 
    }

    /**
     * INSERT INTO books (id, title) VALUES (NULL, title)
     */
    public function addBook(string $title) : bool
    {
        #$title = addslashes($title);
        echo "</br>INSERT INTO books (id, title) VALUES (NULL, $title)";
        return $this->getDB()->query("INSERT INTO books (id, title) VALUES (NULL, '" .$title . "')");
        echo "</br>--------Dodany tytuł</br>";  
      
    }
} 
