<?php

namespace Classes;

class DeleterDateProduct
{
    private int $id;
    private object $db;
        public function __construct($id)
        {
            try {
                $this->id = PreparingHelper::prepareInt($id);
                $this->deleteProduct($this->id);
            }catch (\InvalidArgumentException $exception){
                echo $exception;
            }
        }

        private function deleteProduct($id) : void{
            $this->db = Db::getInstance();
            $this->db->preparedQuery("DELETE FROM `date_project_db_products` WHERE `date_project_db_products`.`id` = ?",$id);
        }
}