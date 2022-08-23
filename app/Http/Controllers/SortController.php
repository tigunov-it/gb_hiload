<?php

namespace App\Http\Controllers;

use App\Handlers\Sort\BubleSort;
use App\Handlers\Sort\QuickSort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SortController extends Controller
{
    public function sort(Request $request): void
    {

        $time_start = time();
        Log::info('Начал работу в ' . $time_start);

        $array = [1, 3, 6, 100, 4, 50, 40, 39, 38];

//        sort($array);

        $buble_sort = new BubleSort();
        $buble_sort_array = $buble_sort->sortArr($array);

        $quick_sort = new QuickSort();
        $quick_sort_array = $quick_sort->sortArr($array);

        $memory_usage = memory_get_usage();
        $time_end = time();
        Log::info('Закончил работу в ' . $time_end);
        Log::debug('Использовано памяти: ' . $memory_usage);

        echo 'Быстрая сортировка: ';
        var_dump($quick_sort_array);

        echo 'Сортировка пузырьком: ';

        var_dump($buble_sort_array);
    }

}
