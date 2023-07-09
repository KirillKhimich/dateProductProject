<?php
namespace Classes;
use Carbon\Carbon;
class createDateProduct
{
    private string $productName;
    private $dateFrom;
    private $dateTo;

    private $repeatRules;

    public function __construct($productName = 0,$dateFrom = 0,$dateTo = 0,$repeatRules = 0){
        $this->productName = $productName;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->repeatRules =$repeatRules;
    }

}