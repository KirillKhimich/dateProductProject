<?php

namespace Classes;
use mysql_xdevapi\Exception;

class Db
{
    private $db;
    private static $instance;

    public const DBTABLENAME = "date_project_db_products";
    private function __construct() {
        try {
            $this->db = new \mysqli('localhost', 'root', '', 'date_project_db');
            $this->db->set_charset('utf8');
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public static function getInstance() : object {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
            return self::$instance;
    }

    public function preparedQuery($query,...$arrayArgs) : void{
            $stmt = $this->db->prepare($query);
            $stmt->execute($arrayArgs);
    }
    public function query($query) : object{
        $stmt = $this->db->query($query);
        return $stmt;
    }

    public function __wakeup() : void{
        throw new \Exception("deserialize is not available");
    }
    private function __clone() : void{

    }
    public function __destruct()
    {
        $this->db->close();
    }

}