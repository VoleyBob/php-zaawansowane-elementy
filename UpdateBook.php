<?php
declare(strict_types=1);

require_once 'Base.php';

class UpdateBook extends Base
{
    //SETery i GETery dla wszystkich pól w UpdateBook
    private $id = 0;
    private $title = '';
    private $autor = '';
    private $isbn = '';
    private $publisher = '';
    private $pages = 0;
    private $year = 0;
    private $cover = '';
    private $copies = 0;

    const HARD_COVER = 'hard';
    const SOFT_COVER = 'soft';

    
    /**
     * Walidacja wszystkich pól
     * int jest int i czy >0   is_int()
     * string powinien być wyescape'owany    adslashes()
     * isbn = 13 znaków     mb_strlen()
     * cover = jedna z dwóch możliwosci
     * year ma mieć 4 cyfry i nie większy niż teraz     mb_strlen()
     */
    public function validate() : bool
    {
        if (!is_int($this->id)) {
            echo "# ID isn`t INT #";
            return false;
        }   

        if ($this->title) {
            $this->title = addslashes($this->title);
            return true;
        }   

        if (mb_strlen($this->isbn) !== 13) {
            echo "# Błędny ISBN #";
            return false;
        }   

        if (!is_int($this->pages)) {
            echo "# PAGES isn`t INT #";
            return false;
        }        

        if (!is_int ($this->year)) {
            echo "# YEAR isn`t INT #";
            return false;
        }      

        if (mb_strlen($this->year) !== 4) {
            echo "# YEAR za krótki/za długi #";
            return false;
        }   

        if (!is_int($this->copies)) {
            echo "# COPIES isn`t INT #";
            return false;
        }        

        if ($this->cover !== self::HARD_COVER || $this->cover !== self::SOFT_COVER) {
            echo "# Wrong type of cover #";
            return false;
        }        
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAutor() : string
    {
        return $this->autor;
    }

    /**
     * @param string $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return string
     */
    public function getIsbn() : string
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return string
     */
    public function getPublisher() : string
    {
        return $this->publisher;
    }

    /**
     * @param string $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return int
     */
    public function getPages() : string
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return int
     */
    public function getYear() : int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getCover() : string
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return int
     */
    public function getCopies() : int
    {
        return $this->copies;
    }

    /**
     * @param int $copies
     */
    public function setCopies($copies)
    {
        $this->copies = $copies;
    }



    public function update2() : bool
    {
        echo 'update';
        if (!$this->validate()) {
            echo "# Error in update #";
            return false;
        }
        //Update
        return $this->getDB()->query(
            "UPDATE books SET (
            title = '" . $this->title . "',
            autor = '" . $this->autor . "',
            isbn = '" . $this->isbn . "',
            publisher = '" . $this->publisher . "',
            pages = '" . $this->pages . "',
            year = '" . $this->year . "',
            cover = '" . $this->cover . "',
            copies = '" . $this->copies . "')
            WHERE id='" . $this->id . "')"
        );
        echo 'Rekord zmodyfikowany';        
    }
}
