<?php

namespace Classes;
class db
{
    private $db;
    private static $instance;
    private function __construct(){
        try {
            $this->db = new \mysqli('localhost', 'root', '', 'date_project_db');
            $this->db->set_charset("utf8");
        }catch (\Exception $e){
            echo 'database is not available: ',  $e->getMessage();
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
            return self::$instance;
    }

    public function createProduct($productName,$dateFrom,$dateTo,$repeatRules,$description){
       $stmt = $this->db->prepare("INSERT INTO `date_project_db_products` (`id`, `name`, `description`, `date_from`, `date_to`, `repeat_rules`)
                   VALUES (NULL,?,?,?,?,?)");
       $stmt->execute([$productName,$description,$dateFrom,$dateTo,$repeatRules]);
    }
    public function selectProducts(){
        $result = $this->db->query("SELECT * FROM `date_project_db_products`");
        foreach ($result as $row) {
            $users[] = $row;
        }
        return $users;

    }
    public function __wakeup(){
        throw new \Exception("deserialize is not available");
    }
    private function __clone(){

    }
    public function __destruct()
    {
        $this->db->close();
    }

}