<?php

class Database
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    protected $conn = NULL;
    private $dbname = "locacao";

    public function open()
    {
        $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname . "", $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ));
        return $this->conn;
    }

    public function close()
    {
        $this->conn = NULL;
    }

    public function checkStatus()
    {
        if (! $this->conn)
        {
            echo "<h3> O sistema não está conectado a [$this->dbname] em [$this->host]</h3>";
        } else
        {
            echo "<h3> O sistema está conectado a [$this->dbname] em [$this->host]</h3>";
        }
    }

    public function arr_to_str($arr, $delimiter = " ")
    {
        $value = "";
        foreach ($arr as $key => $element)
        {
            $value .= isset($arr[$key + 1]) ? $element . $delimiter : $element;
        }
        return $value;
    }

}

?>
