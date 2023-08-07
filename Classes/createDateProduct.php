<?php
namespace Classes;
class createDateProduct
{
    use comprasionTrait;
    private $db;
    private  $productName;
    private  $description;
    private  $dateFrom;
    private  $dateTo;
    private  $repeatRules;

    public function __construct($productName,$dateFrom,$dateTo,$repeatRules = 7,$description = "no description"){
        $this->productName = $this->isString($productName);
        $this->dateFrom = $this->isDate($dateFrom);
        $this->dateTo = $this->isDate($dateTo);
        $this->repeatRules = $this->isInt($repeatRules);
        $this->description = $this->isString($description);
        if ($this->productName !== false && $this->dateFrom !== false && $this->dateTo !== false && $this->repeatRules !== false){
            $this->db = db::getInstance();
            $this->db->createProduct($this->productName,$this->dateFrom,$this->dateTo,$this->repeatRules,$this->description);

        }else throw new \Exception("an error occurred during creating the products");


    }
}