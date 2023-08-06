<?php
declare(strict_types=1);

namespace App\Tests\Algorithm\Implementation\SearchAlgorithms;

use App\Algorithm\Implementation\SearchAlgorithms\BinarySearchAlgorithm;
use App\Algorithm\Implementation\SearchAlgorithms\JumpSearchAlgorithm;
use App\Utility\ArrayUtils;
use PHPUnit\Framework\TestCase;

class JumpSearchAlgorithmTest extends TestCase
{
    private ArrayUtils            $arrayUtils;
    private JumpSearchAlgorithm $algorithm;

    protected function setUp(): void
    {
        $this->arrayUtils = new ArrayUtils();
        $this->algorithm  = new JumpSearchAlgorithm();
    }

    public function testSearch()
    {
        $haystack = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $needle   = 5;

        $result = $this->algorithm->search($haystack, $needle);

        $this->assertEquals($needle, $haystack[$result]);
    }
}
