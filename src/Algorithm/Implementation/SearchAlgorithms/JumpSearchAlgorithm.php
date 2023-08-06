<?php declare(strict_types=1);

namespace App\Algorithm\Implementation\SearchAlgorithms;

class JumpSearchAlgorithm
{
    /**
     * @throws \Exception
     */
    public function search(array $haystack, int $needle)
    {
        $workingArray = $haystack;
        $count        = count($workingArray);

        $blockSize = sqrt($count);

        $start = 0;
        $end   = $blockSize - 1;

        while ($workingArray[$end] < $needle) {
            if ($end === $count - 1) {
                break;
            }

            $start = min($count - 1, $start + $blockSize);
            $end   = min($count - 1, $end + $blockSize);
        }

        if ($needle > $workingArray[$end]) {
            throw new \Exception();
        }

        for ($i = $end; $i >= $start; $i--) {
            if ($workingArray[$i] === $needle) {
                return $i;
            }
        }

        throw new \Exception();
    }
}