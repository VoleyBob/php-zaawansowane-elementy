<?php
declare(strict_types=1);

require_once 'Base.php';

class ReadBook extends Base
{
    private $id = 0;
    private $title = null;

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function validate()
    {
        if ($this->id !== null) {
            if ((int) $this->id <= 0) {
                return false;
            }
        }
        if ($this->title !== null) {
            $this->title = addslashes($this->title);
        }
        return true;
    }

    /**
     * Bedziemy pobierać ksiązkę z bazy
     * SELECT * FROM books WHERE id = $this->id
     * "SELECT * FROM books WHERE name = \'\"test\";DELETE FROM books\'"
     */
    public function get() 
    {
        if ($this->validate()) {
            if ($this->id) {
                $result = $this->getDB()->query("SELECT * FROM books WHERE id = " . $this->id);
            } elseif ($this->title) {
                $result = $this->getDB()->query("SELECT * FROM books WHERE title = " . $this->title);
            }

            $temp = array();
            while ($row = $result->fetch_assoc()) {
                $temp[] = $row;    //['title']
              }
    
            return $temp;
    
        }
    }
} 