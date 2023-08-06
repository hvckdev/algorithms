<?php

namespace App\Algorithm\Implementation\SortAlgorithms;

use App\Algorithm\Contracts\SortAlgorithmInterface;

class MergeSortAlgorithm implements SortAlgorithmInterface
{
    public function sort(array $array): array
    {
        if (array_key_first($array) > 1) {
            throw new \LogicException('First key must be 1 or 0');
        }

        $count = count($array);

        if (($first = array_key_first($array)) === 0) {
            // increment keys
            array_unshift($array, null);
            unset($array[0]);

            ++$first;
        }

        return $this->recursivelyMerge($array, $first, $count);
    }

    private function recursivelyMerge(array $array, int $first, int $count): array
    {
        if ($first < $count) {
            $half = round(($first + $count) / 2, 0, PHP_ROUND_HALF_DOWN);

            $array = $this->recursivelyMerge($array, $first, $half);
            $array = $this->recursivelyMerge($array, $half + 1, $count);

            $array = $this->merge($array, $first, $half, $count);
        }

        return $array;
    }

    private function merge(array $array, int $firstKey, int $halfKey, int $count): array
    {
        $firstArrayCount = $halfKey - $firstKey + 1;
        $secondArrayCount = $count - $halfKey;

        $firstArray = $secondArray = [];

        for ($i = 1; $i <= $firstArrayCount; $i++) {
            $firstArray[$i] = $array[$firstKey + $i - 1];
        }

        for ($j = 1; $j <= $secondArrayCount; $j++) {
            $secondArray[$j] = $array[$halfKey + $j];
        }

        $i = $j = 1;

        for ($k = $firstKey; $k <= $count; $k++) {
            if (array_key_exists($i, $firstArray)) {
                if (array_key_exists($j, $secondArray) && $firstArray[$i] >= $secondArray[$j]) {
                    $array[$k] = $secondArray[$j];

                    ++$j;
                } else {
                    $array[$k] = $firstArray[$i];

                    ++$i;
                }
            }
        }

        return $array;
    }
}