<?php
declare(strict_types=1);

namespace App\Tests\Algorithm\Implementation\SearchAlgorithms;

use App\Algorithm\Implementation\SearchAlgorithms\BinarySearchAlgorithm;
use App\Utility\ArrayUtils;
use PHPUnit\Framework\TestCase;

class BinarySearchAlgorithmTest extends TestCase
{
    private ArrayUtils            $arrayUtils;
    private BinarySearchAlgorithm $algorithm;

    protected function setUp(): void
    {
        $this->arrayUtils = new ArrayUtils();
        $this->algorithm  = new BinarySearchAlgorithm();
    }

    public function testSearch()
    {
        $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $needle   = 5;

        $result = $this->algorithm->search($haystack, $needle);

        $this->assertEquals($needle, $haystack[$result]);
    }

    public function testLeftSearch()
    {
        $haystack = [2, 4, 4, 4, 5, 6, 7, 4];
        $needle   = 4;

        $result = $this->algorithm->searchLeft($haystack, $needle);

        $this->assertEquals(1, $result);
    }

    public function testRightSearch()
    {
        $haystack = [2, 4, 4, 4, 5, 6, 7, 4];
        $needle   = 4;

        $result = $this->algorithm->searchRight($haystack, $needle);

        $this->assertEquals(6, $result);
    }
}
