<?php
class APCu {
    
    private $time; //Domyślny czas istenienia w cache
    private $namespace;

    public function __construct(int $time = null, string $namespace = null)
    {
        $this->time = $time;
        $this->namespace = $namespace;
    }

    public function setNamespace(string $namespace) : APCu
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function getCurrentNamespace() : string
    {
        return $this->namespace;
    }

    public function setTime(int $time) : APCu
    {
        $this->time = $time;
        
        return $this;
    }

    public function getTime() : int
    {
        return $this->time;
    }

    /**
     * @param string|null $key
     * @param null $data
     * @param array $test
     *
     * @return bool|bool[]
     */
    public function add(string $key = null, $data = null, array $test = null)
    {
        if ($test) {
            return $this->addMulti($test);
        } else {
//            var_dump()
            if ($this->namespace) {
                return apcu_store($this->namespace . '_' . $key, $data, $this->time);
            } else {
                return apcu_store($key, $data, $this->time);
            }
        }
    }

    public function addMulti(array $data) : array
    {
        /**
         * array(
         * "key1" => false,
         * "key2" => true
         * )
         */
        if ($this->namespace) {
            $temp = array();
            foreach ($data as $key => $value) {
                $temp[$this->namespace . '_' . $key] = $value;
            }
            return apcu_store($temp, $this->time);
        }
        return apcu_store($data, $this->time);
    }

    public function get(string $key)
    {
        if ($this->namespace) {
            return apcu_fetch($this->namespace . '_' . $key);
        }
        return apcu_fetch($key);
    }

    public function delete(string $key)
    {
        if ($this->namespace) {
            return apcu_delete($this->namespace . '_' . $key);
        }
        return apcu_delete($key);
    }

    public function clearAll() : bool
    {
        return apcu_clear_cache();
    }
}