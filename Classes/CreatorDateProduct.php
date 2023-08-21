<?php
namespace Classes;
class CreatorDateProduct extends DateProductEventer
{
    private static string  $productName;
    private static string $description;
    private static string $dateFrom;
    private static string $dateTo;
    private static int $repeatRules;

    public function __construct()
    {
        parent::__construct();
    }
    public function exceptionTrigger($event,\Exception $exception) : object{
        $this->mediator->notify($this,$event);
        return $exception;
    }

    public function CreateProduct($productName,$dateFrom,$dateTo,$repeatRules,$description = "no description") : void{
        try {
            self::$productName = PreparingHelper::prepareString($productName);
            self::$dateFrom = PreparingHelper::prepareDate($dateFrom);
            self::$dateTo = PreparingHelper::prepareDate($dateTo);
            self::$repeatRules = PreparingHelper::prepareInt($repeatRules);
            self::$description = PreparingHelper::prepareString($description);
            self::createDbProduct();
        }catch (\InvalidArgumentException $e){
            
        }
    }
    private static function createDbProduct() : void{ // creating function(writing data in db)
        $db = Db::getInstance();
        $dbTableName = Db::DBTABLENAME;
        $db->preparedQuery("INSERT INTO $dbTableName (`name`, `date_from`, `date_to`, `repeat_rules`,`description`)
            VALUES (?,?,?,?,?)",
        self::$productName,
        self::$dateFrom,
        self::$dateTo,
        self::$repeatRules,
        self::$description);
    }

}