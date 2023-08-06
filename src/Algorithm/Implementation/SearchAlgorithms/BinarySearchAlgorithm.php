<?php declare(strict_types=1);

namespace App\Algorithm\Implementation\SearchAlgorithms;

class BinarySearchAlgorithm
{
    public function search(array $haystack, int $needle): float|int
    {
        $arrayToSearch = $haystack;

        $left  = 0;
        $right = count($arrayToSearch) - 1;

        while ($left < $right) {
            $average = ceil(($left + $right) / 2);

            if ($arrayToSearch[$average] === $needle) {
                return $average;
            }

            if ($arrayToSearch[$average] < $needle) {
                $left += 1;
            }
            else {
                $right -= 1;
            }
        }

        throw new \InvalidArgumentException("Cannot find $needle in haystack");
    }

    public function searchLeft(array $haystack, int $needle): float|int
    {
        $arrayToSearch = $haystack;

        $left  = 0;
        $right = count($arrayToSearch) - 1;

        while ($left + 1 < $right) {
            $average = ceil($left + ($right - $left) / 2);

            if ($arrayToSearch[$average] < $average) {
                $left = $average;
            }
            else {
                $right = $average;
            }
        }

        if ($arrayToSearch[$right] === $needle) {
            return $right;
        }

        throw new \InvalidArgumentException("$needle not found in haystack");
    }

    public function searchRight(array $haystack, int $needle)
    {
        $arrayToSearch = $haystack;

        $left  = 0;
        $right = count($arrayToSearch) - 1;

        while ($left + 1 < $right) {
            $average = ceil($left + ($right - $left) / 2);

            if ($arrayToSearch[$average] <= $average) {
                $right = $average;
            }
            else {
                $left = $average;
            }
        }

        if ($arrayToSearch[$right] === $needle) {
            return $left;
        }

        throw new \InvalidArgumentException("$needle not found in haystack");
    }
}