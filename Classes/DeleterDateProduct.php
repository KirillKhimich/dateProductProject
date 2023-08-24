<?php

namespace Classes;

class DeleterDateProduct extends DateProductEventer
{
        public static function deleteProduct(int $id) : void{ // delete product by $id
            try {
                $id = PreparingHelper::prepareInt($id);
                $dbTableName = Db::DBTABLENAME;
                Db::getInstance()->preparedQuery("DELETE FROM $dbTableName WHERE $dbTableName.`id` = ?",$id);
            }catch (\InvalidArgumentException $exception){
                echo $exception;
            }
        }
}