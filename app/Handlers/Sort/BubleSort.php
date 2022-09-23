<?php

namespace App\Handlers\Sort;

class BubleSort implements SortInterface
{

    public function sortArr($array): array
    {
        $size = sizeof($array)-1;
        for ($i = $size; $i>=0; $i--) {
            for ($j = 0; $j<=($i-1); $j++)
                if ($array[$j]>$array[$j+1]) {
                    $k = $array[$j];
                    $array[$j] = $array[$j+1];
                    $array[$j+1] = $k;
                }
        }

        return $array;

    }

}
