<?php declare(strict_types=1);

namespace App\Tests\Algorithm\Implementation\SortAlgorithms;

use App\Algorithm\Contracts\SortAlgorithmInterface;
use App\Algorithm\Implementation\SortAlgorithms\InsertionSortAlgorithm;
use App\Algorithm\Implementation\SortAlgorithms\SelectionSortAlgorithm;
use App\Utility\ArrayUtils;
use PHPUnit\Framework\TestCase;

class SelectionSortAlgorithmTest extends TestCase
{
    private ArrayUtils $arrayUtils;
    private SortAlgorithmInterface $sortAlgorithm;

    protected function setUp(): void
    {
        parent::setUp();

        $this->arrayUtils = new ArrayUtils();
        $this->sortAlgorithm = new SelectionSortAlgorithm();
    }

    public function testSortCorrectly()
    {
        $array = $this->arrayUtils->getRandomized();

        $sorted = $this->sortAlgorithm->sort($array);

        $this->assertNotEquals($array, $sorted);

        foreach ($sorted as $key => $item) {
            $this->assertGreaterThanOrEqual($item, $sorted[$key + 1] ?? $item);
        }
    }
}
