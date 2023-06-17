<?php

namespace App\Utility;

class ArrayUtils
{
    public function getRandomized(int $startFrom = 0, int $count = 10): array
    {
        $a = range(0, 100);
        shuffle($a);

        $a = array_slice($a, $startFrom, $count);

        for ($i = 0; $i < $startFrom; $i++) {
            unset($a[$i]);
        }

        return $a;
    }
}