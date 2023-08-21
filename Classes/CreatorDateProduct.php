<?php
namespace Classes;
class CreatorDateProduct extends DateProductEventer
{
    private string  $productName;
    private string $description;
    private string $dateFrom;
    private string $dateTo;
    private int $repeatRules;

    public function __construct()
    {
        parent::__construct();
    }

    public function CreateProduct($productName,$dateFrom,$dateTo,$repeatRules,$description = "no description") : void{
        try {
            $this->productName = PreparingHelper::prepareString($productName);
            $this->dateFrom = PreparingHelper::prepareDate($dateFrom);
            $this->dateTo = PreparingHelper::prepareDate($dateTo);
            $this->repeatRules = PreparingHelper::prepareInt($repeatRules);
            $this->description = PreparingHelper::prepareString($description);
            $this->createDbProduct();
        }catch (\InvalidArgumentException $e){
            $this->exceptionTrigger("CreatorException",$e);
        }
    }
    private function createDbProduct() : void{ // creating function(writing data in db)
        $db = Db::getInstance();
        $dbTableName = Db::DBTABLENAME;
        $db->preparedQuery("INSERT INTO $dbTableName (`name`, `date_from`, `date_to`, `repeat_rules`,`description`)
            VALUES (?,?,?,?,?)",
            $this->productName,
            $this->dateFrom,
            $this->dateTo,
            $this->repeatRules,
            $this->description);
    }

}