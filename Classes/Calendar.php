<?php

namespace Classes;

use Carbon\CarbonImmutable;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
class Calendar
{
    public static function buildMonth($year, $month)
    {
        $startOfMonth = CarbonImmutable::create($year, $month);
        $startOfMonth = $startOfMonth->startOfMonth();
        $endOfMonth = $startOfMonth->endOfMonth();
        $startOfWeek = $startOfMonth->startOfWeek();
        $endOfWeek = $endOfMonth->startOfWeek();

        $array =  [
            'year' => $startOfMonth->year,
            'month' => $startOfMonth->month,
            'weeks'=>($startOfWeek->toPeriod($endOfWeek)->map(fn($date)=>[
                    'path' => $date->format('Y/m/d'),
                    'day' => $date->day,

            ])
            )
        ];
        $weeks = iterator_to_array($array['weeks']);
        echo "<pre>";
        print_r($weeks);
        echo "</pre>";
        $weeks = array_chunk($weeks,7);
        return $weeks;

    }
}