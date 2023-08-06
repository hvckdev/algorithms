<?php

namespace App\Algorithm\Implementation\SortAlgorithms;

use App\Algorithm\Contracts\SortAlgorithmInterface;

class InsertionSortAlgorithm implements SortAlgorithmInterface
{
    public function sort(array $array): array
    {
        for ($i = 1, $count = count($array) - 1; $i <= $count; ++$i) {
            $key = $array[$i];

            $j = $i - 1;

            while ($j >= 0 && $array[$j] > $key) {
                $array[$j + 1] = $array[$j];

                --$j;
            }

            $array[$j + 1] = $key;
        }

        return $array;
    }
}