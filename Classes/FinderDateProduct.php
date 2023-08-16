<?php

namespace Classes;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Carbon\Carbon;
class FinderDateProduct
{
    private array $products;
    private string $dateFrom;
    private string $dateTo;

    public function __construct($dateFrom, $dateTo)
    {
        try {
            $this->dateFrom = PreparingHelper::prepareDate($dateFrom);
            $this->dateTo = PreparingHelper::prepareDate($dateTo);
            $this->products = $this->getPeriod($this->selectProducts());
            $this->checkMinDate($dateFrom);
            $this->checkMaxDate($dateTo);
        }catch (\InvalidArgumentException $e) {
            echo $e;
        }
    }
    public function dateCompare() : array // comparing date and return needed products
    {
        $period = CarbonPeriod::create($this->dateFrom, $this->dateTo);
        foreach ($this->products as $product){
            foreach ($product['period'] as $date) {
                if ($date->between($period->getStartDate(), $period->getEndDate())) {
                    $neededProducts[] = $product;
                    break;
                }
            }
        }
        return $neededProducts;
    }
    private function checkMinDate($dateFrom) : void{ // checking minimal date: today
        if ($dateFrom < Carbon::today()->format('Y-m-d')){
            throw new \InvalidArgumentException("Selected date dont have a sense, less than needed");
        }
    }
    private function checkMaxDate($dateTo) : void{ // checking maximal date: 6 month
        if (strtotime($dateTo) > strtotime(Carbon::today()->add(CarbonInterval::month(6)))){
            throw new \InvalidArgumentException("Selected date dont have a sense, more than needed");
        }
    }
    private function getPeriod($products) : array // getting period for array "Product"
    {
        foreach ($products as &$product) {
            $product['period'] = new CarbonPeriod("{$product['date_from']}", "{$product['repeat_rules']}day", "{$product['date_to']}");
        }
        return $products;
    }

    private function selectProducts() : array{ // selecting products from db
        $db = Db::getInstance();
        $result = $db->query("SELECT * FROM `date_project_db_products`");
        foreach ($result as $row) {
            $products[] = $row;
        }
        return $products;
    }
}
