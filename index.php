<?php

require_once 'TimeTravel.php';

$start = new DateTime('31-12-1985');
$end = new DateTime('31-12-1985');

var_dump($end);

$travel = new TimeTravel ($start, $end);
echo $travel->getTravelInfo();


$interval = new DateInterval('PT1000000000S');
echo $travel->findDate($interval)->format('d,M,Y');

$step = 'P1M1W1D';
$jumps = $travel->backToTheFutureStepByStep(new DateInterval($step));

foreach ($jumps as $jump) {
    echo $jump;
}