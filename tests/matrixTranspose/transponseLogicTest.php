<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . "/../../src/matrixTranspose/transponse_logic.php";

class transponseLogicTest extends TestCase
{
    public function testTransposeMatrix()
    {
        $matrix = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ];

        $expectedResult = [
            [1, 4, 7],
            [2, 5, 8],
            [3, 6, 9],
        ];

        $this->assertEquals($expectedResult, transposeMatrix($matrix));
    }

    // Add more test cases as needed
}
