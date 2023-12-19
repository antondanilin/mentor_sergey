<?php

function transposeMatrix(array $matrix): array
{
    $transposedMatrix = [];
    foreach ($matrix as $rowIndex => $row) {
        foreach ($row as $colIndex => $value) {
            $transposedMatrix[$colIndex][$rowIndex] = $value;
        }
    }

    return $transposedMatrix;
}
