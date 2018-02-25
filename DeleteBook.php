<?php
declare(strict_types=1);

require_once 'Base.php';

class DeleteBook extends Base
{
    public function validate() 
    {
        $result = $this->getDB()->query("DELETE FROM books WHERE id = ".$this->id);
        echo "OK";
    }
} 