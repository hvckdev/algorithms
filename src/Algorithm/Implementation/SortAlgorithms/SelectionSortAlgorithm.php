<?php declare(strict_types=1);

namespace App\Algorithm\Implementation\SortAlgorithms;

use App\Algorithm\Contracts\SortAlgorithmInterface;

class SelectionSortAlgorithm implements SortAlgorithmInterface
{
    public function sort(array $array): array
    {
        $count = count($array);

        for ($i = $count - 1; $i > 0; $i--) {
            $maxIndex = $i;

            for ($j = 0; $j < $i; $j++) {
                if ($array[$j] >= $array[$maxIndex]) {
                    $maxIndex = $j;
                }
            }

            if ($maxIndex != $i) {
                $temp             = $array[$maxIndex];
                $array[$maxIndex] = $array[$i];
                $array[$i]        = $temp;
            }
        }

        return $array;
    }
}