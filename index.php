<?php
require __DIR__ . '/vendor/autoload.php';
//$onj2 = new \Classes\finderDateProduct("2023-08-01","2023-08-29");
/*try {
    $obj = new \Classes\createDateProduct("sasda","2023-08-12","2023-08-21",4);
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
    <link rel="stylesheet" href="src/style.css">
    <link rel="stylesheet" href="src/bootstrap.css">
    <title>Document</title>
</head>
<body>
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
