<?php
namespace Classes;
class CreatorDateProduct
{
    private string  $productName;
    private string $description;
    private string $dateFrom;
    private string $dateTo;
    private int $repeatRules;

    public function __construct($productName,$dateFrom,$dateTo,$repeatRules = 7,$description = "no description"){ //preparing variables and call creating function
        try {
            $this->productName = PreparingHelper::prepareString($productName);
            $this->dateFrom = PreparingHelper::prepareDate($dateFrom);
            $this->dateTo = PreparingHelper::prepareDate($dateTo);
            $this->repeatRules = PreparingHelper::prepareInt($repeatRules);
            $this->description = PreparingHelper::prepareString($description);
            $this->createProduct($this->productName,$this->dateFrom,$this->dateTo,$this->repeatRules,$this->description);
        }catch (\InvalidArgumentException $e){
            echo $e;
        }
    }
    private function createProduct($productName,$dateFrom,$dateTo,$repeatRules,$description) : void{ // creating function(writing data in db)
        $db = Db::getInstance();
        $db->preparedQuery("INSERT INTO `date_project_db_products` (`name`, `date_from`, `date_to`, `repeat_rules`,`description`)
            VALUES (?,?,?,?,?)",$productName,$dateFrom,$dateTo,$repeatRules,$description);
    }
}