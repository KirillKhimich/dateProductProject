<?php
require __DIR__ . '/vendor/autoload.php';
$finder = new \Classes\finderDateProduct("2023-08-16","2022-02-15");
$dates = $finder->dateCompare();
$deleter = new \Classes\DeleterDateProduct(3);
if (!empty($_POST['']))
/*try {
    $obj = new \Classes\createDateProduct("sasda","2023-08-12","2023-08-21",2);
}catch (Exception $exception){
    echo $exception->getMessage();
}*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/jquery-ui.css">
    <script src="src/js/jquery-3.7.0.min.js" ></script>
    <script src="src/js/jquery-ui.min.js"></script>
    <script src="src/js/scripts.js"></script>
</head>
<body><p>Date: <input type="text" id="datepicker"></p>

    <form action="">
        <div class="searchBlock" >
            <input type="text" class="searchInput">
            <div class="calendarBlock">
                <p>Ivent Date</p>
            </div>
            <div class="searchButton">
                <button type="submit"> Искать</button>
            </div>
        </div>
    </form>

</body>
</html>
