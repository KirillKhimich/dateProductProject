<?php

namespace Classes;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
class finderDateProduct
{
    use comprasionTrait;
    private $db;
    private $products;
    private $dateFrom;
    private $dateTo;

    public function __construct($dateFrom, $dateTo)
    {
        $this->dateFrom = $this->isDate($dateFrom);
        $this->dateTo = $this->isDate($dateTo);

        if ($this->dateFrom !== false && $this->dateTo !== false){
            $this->db = db::getInstance();
            $this->products = $this->getPeriod($this->db->selectProducts());
            $this->dateComparison($dateFrom,$dateTo,$this->products);
        }else throw new \Exception("an error occurred during selecting the products");
    }

    private function dateComparison($dateFrom, $dateTo, $products)
    {
        $period = CarbonPeriod::create($dateFrom,$dateTo);
        foreach ($products as $product) {
            foreach ($product['period'] as $date) {
                if ($date->between($period->getStartDate(),$period->getEndDate())) {

                }
            }
        }
    }
    private function getPeriod(array $products)
    {
        foreach ($products as &$product) {
            $product['period'] = new CarbonPeriod("{$product['date_from']}", "{$product['repeat_rules']}day", "{$product['date_to']}");
        }
        return $products;
    }
}
