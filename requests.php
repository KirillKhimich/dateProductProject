<?php
// request for searching products
if (!empty($_GET['searchDateFrom']) && !empty($_GET['searchDateTo'])) {
    if (is_string($_GET['searchDateFrom']) && is_string($_GET['searchDateTo'])) {
        $finder = new \Classes\finderDateProduct($_GET['searchDateFrom'], $_GET['searchDateTo']);
        $dates = $finder->dateCompare();
    }
}


\Classes\DeleterDateProduct::deleteProduct(3);
/*try {
    Classes\CreatorDateProduct::CreateProduct("салат","2023-09-01","2023-09-30",3);
}catch (Exception $exception){
    echo $exception->getMessage();
}*/