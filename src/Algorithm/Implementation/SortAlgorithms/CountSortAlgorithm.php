<?php declare(strict_types=1);

namespace App\Algorithm\Implementation\SortAlgorithms;

use App\Algorithm\Contracts\SortAlgorithmInterface;

class CountSortAlgorithm implements SortAlgorithmInterface
{
    public function sort(array $array): array
    {
        $counts      = [];
        $sortedArray = [];
        $max         = 0;

        foreach ($array as $item) {
            isset($counts[$item]) ? $counts[$item]++ : $counts[$item] = 1;

            if ($max < $item) {
                $max = $item;
            }
        }

        for ($i = 0; $i < $max; $i++) {
            if (isset($counts[$i])) {
                for ($j = 0; $j < $counts[$i]; $j++) {
                    $sortedArray[] = $counts[$i];
                }
            }
        }

        return $sortedArray;
    }
}