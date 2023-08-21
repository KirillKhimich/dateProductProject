<?php

namespace Classes;

class DeleterDateProduct
{
    private static int $id;
    private static object $db;
        public static function deleteProduct($id){
            try {
                self::$id = PreparingHelper::prepareInt($id);
                self::deleteDbProduct();
            }catch (\InvalidArgumentException $exception){
                echo $exception;
            }
        }
        private static function deleteDbProduct() : void{
            self::$db = Db::getInstance();
            $dbTableName = Db::DBTABLENAME;
            self::$db->preparedQuery("DELETE FROM `date_project_db_products` WHERE $dbTableName.`id` = ?",self::$id);
        }
}