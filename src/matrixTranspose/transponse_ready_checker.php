<?php

class MatrixTransposeException extends Exception {}

function isMatrixEligibleForTranspose(array $jsonMatrix): bool
{
    try {
        if (!is_array($jsonMatrix) || empty($jsonMatrix)) {
            throw new MatrixTransposeException("Input is not a valid array or is empty.");
        }

        if (!is_array($jsonMatrix[0]) || empty($jsonMatrix[0])) {
            throw new MatrixTransposeException("Input is not a valid two-dimensional array or the first row is empty.");
        }

        $numColumns = count($jsonMatrix[0]);

        foreach ($jsonMatrix as $row) {
            if (!is_array($row) || count($row) !== $numColumns) {
                throw new MatrixTransposeException("Rows have different number of columns.");
            }
        }

        return true; // Eligible for transposition

    } catch (MatrixTransposeException $e)
    {
        printf("Error: %s\n", $e->getMessage());
        return false;
    }
}
