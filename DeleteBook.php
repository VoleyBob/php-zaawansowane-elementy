<?php
declare(strict_types=1);

require_once 'Base.php';

class DeleteBook extends Base
{

    private $title = 0;
    private $id = 0;
 /*   
    public function __construct($id)
    {
        $this->id=(int)$id;
    }

    public function title($title)
    {
        $this->title=$title;
    }
*/    
    public function validate() 
    {

    }    


    public function delete(int $id) 
    {
        // Maciek
        /*
        $result = $this->getDB()->query("DELETE FROM books WHERE id = ".$this->id);
        echo "OK";
        */

        // Paweł
        $this->getDB()->query("DELETE FROM books WHERE id = $id");
        echo 'Skasowane wg ID';
    }

    /**
     * usuwanie książki po tytule
     * 
     * @param $title
     */
    public function deleteByTitle(string $title)
    {
        $this->getDB()->query("DELETE FROM books WHERE title = ".$title);
        echo 'Usuwanie po tytule';
        
    }

}