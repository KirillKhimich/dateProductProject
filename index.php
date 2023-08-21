<?php
require __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/requests.php';
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

<body>
    <form action="" method="get">
        <div class="searchBlock" >
                <input type="text" class="searchDate" readonly placeholder="dateFrom" id="searchDateFrom" name="searchDateFrom">
                <input type="text" class="searchDate" readonly placeholder="dateTo" id="searchDateTo" name="searchDateTo">
                <button type="submit" class="searchButton"> search</button>
        </div>
    </form>
    <div id="result">
        <?php if (!empty($dates)){ foreach($dates as $date){?>
            <div class="resultsBlocks">
                <h3 class="resultsName" ><?=$date['name']?></h3>
                <h4 class="resultsDesc"><?=$date['description']?></h4>
                <h5 class="resultsDates">Доступные даты: </h5>
                <?php foreach($date['period'] as $period){?><p><?php echo $period->format('m-d'). ","; }?></p>

            </div>
        <?php }}?>
    </div>
</body>
</html>