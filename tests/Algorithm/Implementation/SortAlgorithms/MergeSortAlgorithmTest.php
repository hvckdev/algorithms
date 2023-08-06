<?php

namespace App\Tests\Algorithm\Implementation\SortAlgorithms;

use App\Algorithm\Contracts\SortAlgorithmInterface;
use App\Algorithm\Implementation\SortAlgorithms\MergeSortAlgorithm;
use App\Utility\ArrayUtils;
use PHPUnit\Framework\TestCase;

class MergeSortAlgorithmTest extends TestCase
{
    private ArrayUtils $arrayUtils;
    private SortAlgorithmInterface $sortAlgorithm;

    protected function setUp(): void
    {
        parent::setUp();

        $this->arrayUtils = new ArrayUtils();
        $this->sortAlgorithm = new MergeSortAlgorithm();
    }

    public function testSortCorrectly(): void
    {
        $array = $this->arrayUtils->getRandomized();

        $sorted = $this->sortAlgorithm->sort($array);

        $this->assertNotEquals($array, $sorted);

        foreach ($sorted as $key => $item) {
            $this->assertGreaterThanOrEqual($item, $sorted[$key + 1] ?? $item);
        }
    }

    public function testSortThrowsExceptionWhenArrayHasWrongKeys(): void
    {
        // array must start from 0 or 1
        $array = $this->arrayUtils->getRandomized(2);

        $this->expectException(\LogicException::class);

        $this->sortAlgorithm->sort($array);
    }
}