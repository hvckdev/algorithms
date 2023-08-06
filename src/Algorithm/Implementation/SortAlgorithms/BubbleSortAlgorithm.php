<?php
declare(strict_types=1);

namespace App\Algorithm\Implementation\SortAlgorithms;

use App\Algorithm\Contracts\SortAlgorithmInterface;

class BubbleSortAlgorithm implements SortAlgorithmInterface
{
    public function sort(array $array): array
    {
        $arrayToSort = $array;
        $count       = count($array);

        for ($i = $count - 1; $i > 0; $i--) {
            for ($j = 0; $j < $i; $j++) {
                $temp = $arrayToSort[$j];

                if ($arrayToSort[$j] > $arrayToSort[$j + 1]) {
                    $arrayToSort[$j] = $arrayToSort[$j + 1];
                    $arrayToSort[$j + 1] = $temp;
                }
            }
        }

        return $arrayToSort;
    }
}