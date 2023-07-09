<?php
require __DIR__ . '/vendor/autoload.php';
$date = Classes\Calendar::buildMonth(year: 2023,month: 6);
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
    <table class="m-auto text-center month">
        <thead>
        <tr>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th>Sa</th>
            <th>Su</th>
        </tr>
        </thead>
        <tbody>
        <?foreach ($date as $weeks){ $date?>
            <tr>
            <?foreach ($weeks as $days){ $date?>
                <td><?=$days['day']?></td>
            <?php }?>
            </tr>
        <?php }?>
        </tbody>

</body>
</html>
