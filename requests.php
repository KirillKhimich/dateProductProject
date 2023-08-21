<?php
// request for searching products
$creator = new \Classes\CreatorDateProduct();
$logger = new \Classes\DateProductLogger(__DIR__ . "/log.txt");
$finder = new \Classes\finderDateProduct();
$mediator = new \Classes\ConcreteMediator($creator, $logger,$finder);
$creator->CreateProduct("салат","2023-09-01","2023-09-30","asd");
if (!empty($_GET['searchDateFrom']) && !empty($_GET['searchDateTo'])) {
    if (is_string($_GET['searchDateFrom']) && is_string($_GET['searchDateTo'])) {
        $dates = $finder->find($_GET['searchDateFrom'], $_GET['searchDateTo']);
    }
}
